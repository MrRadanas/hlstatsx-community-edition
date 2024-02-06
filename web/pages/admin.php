<?php
/*
HLstatsX Community Edition - Real-time player and clan rankings and statistics
Copyleft (L) 2008-20XX Nicholas Hastings (nshastings@gmail.com)
http://www.hlxcommunity.com

HLstatsX Community Edition is a continuation of
ELstatsNEO - Real-time player and clan rankings and statistics
Copyleft (L) 2008-20XX Malte Bayer (steam@neo-soft.org)
http://ovrsized.neo-soft.org/

ELstatsNEO is an very improved & enhanced - so called Ultra-Humongus Edition of HLstatsX
HLstatsX - Real-time player and clan rankings and statistics for Half-Life 2
http://www.hlstatsx.com/
Copyright (C) 2005-2007 Tobias Oetzel (Tobi@hlstatsx.com)

HLstatsX is an enhanced version of HLstats made by Simon Garner
HLstats - Real-time player and clan rankings and statistics for Half-Life
http://sourceforge.net/projects/hlstats/
Copyright (C) 2001  Simon Garner

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.

For support and installation notes visit http://www.hlxcommunity.com
*/

if (!defined('IN_HLSTATS')) {
    exit('Do not access this file directly.');
}

if (empty($game)) {
    $resultGames = $db->query("
        SELECT
            code,
            name
        FROM
            hlstats_Games
        WHERE
            hidden='0'
        ORDER BY
            name ASC 
        LIMIT 0,1

	");
    [$game] = $db->fetch_row($resultGames);
}

class Auth
{
    public $ok    = false;
    public $error = false;

    public $username;
    public $password;
    public $savepass;
    public $sessionStart;
    public $session;

    public $userdata = [];

    public function __construct()
    {
        // @session_start();

        if (valid_request($_POST['authusername'], false)) {
            $this->username     = valid_request($_POST['authusername'], false);
            $this->password     = valid_request($_POST['authpassword'], false);
            $this->savepass     = valid_request($_POST['authsavepass'], false);
            $this->sessionStart = 0;

            // clear POST vars so as not to confuse the receiving page
            unset($_POST);
            $_POST = [];

            $this->session = false;

            if (true == $this->checkPass()) {
                // if we have success, save it in this users SESSION
                $_SESSION['username']         = $this->username;
                $_SESSION['password']         = $this->password;
                $_SESSION['authsessionStart'] = time();
                $_SESSION['acclevel']         = $this->userdata['acclevel'];
            }
        } elseif (isset($_SESSION['loggedin'])) {
            $this->username     = $_SESSION['username'];
            $this->password     = $_SESSION['password'];
            $this->savepass     = 0;
            $this->sessionStart = $_SESSION['authsessionStart'];
            $this->ok           = true;
            $this->error        = false;
            $this->session      = true;

            if (!$this->checkPass()) {
                unset($_SESSION['loggedin']);
            }
        } else {
            $this->ok    = false;
            $this->error = false;

            $this->session = false;

            $this->printAuth();
        }
    }

    public function checkPass()
    {
        global $db;

        $db->query("
				SELECT
					*
				FROM
					hlstats_Users
				WHERE
					username='$this->username'
				LIMIT 1
			");

        if (1 == $db->num_rows()) {
            // The username is OK

            $this->userdata = $db->fetch_array();
            $db->free_result();

            if (md5($this->password) == $this->userdata['password']) {
                // The username and the password are OK

                $this->ok             = true;
                $this->error          = false;
                $_SESSION['loggedin'] = 1;
                if ($this->sessionStart > (time() - 3600)) {
                    // Valid session, update session time & display the page
                    $this->doCookies();

                    return true;
                } elseif ($this->sessionStart) {
                    // A session exists but has expired
                    if ($this->savepass) {
                        // They selected 'Save my password' so we just
                        // generate a new session and show the page.
                        $this->doCookies();

                        return true;
                    } else {
                        $this->ok       = false;
                        $this->error    = 'Your session has expired. Please try again.';
                        $this->password = '';

                        $this->printAuth();

                        return false;
                    }
                } elseif (!$this->session) {
                    // No session and no cookies, but the user/pass was
                    // POSTed, so we generate cookies.
                    $this->doCookies();

                    return true;
                } else {
                    // No session, user/pass from a cookie, so we force auth
                    $this->printAuth();

                    return false;
                }
            } else {
                // The username is OK but the password is wrong

                $this->ok = false;
                if ($this->session) {
                    // Cookie without 'Save my password' - not an error
                    $this->error = false;
                } else {
                    $this->error = 'The password you supplied is incorrect.';
                }
                $this->password = '';
                $this->printAuth();
            }
        } else {
            // The username is wrong
            $this->ok    = false;
            $this->error = 'The username you supplied is not valid.';
            $this->printAuth();
        }
    }

    public function doCookies(): void
    {
        return;
        setcookie('authusername', $this->username, ['expires' => time() + 31536000, 'path' => '', 'domain' => '', 'secure' => 0]);

        if ($this->savepass) {
            setcookie('authpassword', $this->password, ['expires' => time() + 31536000, 'path' => '', 'domain' => '', 'secure' => 0]);
        } else {
            setcookie('authpassword', $this->password, ['expires' => 0, 'path' => '', 'domain' => '', 'secure' => 0]);
        }
        setcookie('authsavepass', $this->savepass, ['expires' => time() + 31536000, 'path' => '', 'domain' => '', 'secure' => 0]);
        setcookie('authsessionStart', time(), ['expires' => 0, 'path' => '', 'domain' => '', 'secure' => 0]);
    }

    public function printAuth(): void
    {
        global $g_options;

        include PAGE_PATH.'/adminauth.php';
    }
}

class AdminTask
{
    public $title       = '';
    public $acclevel    = 0;
    public $type        = '';
    public $description = '';

    public function __construct($title, $acclevel, $type = 'general', $description = '', $group = '')
    {
        $this->title       = $title;
        $this->acclevel    = $acclevel;
        $this->type        = $type;
        $this->description = $description;
        $this->group       = $group;
    }
}

class EditList
{
    public $columns;
    public $keycol;
    public $table;
    public $deleteCallback;
    public $icon;
    public $showid;
    public $drawDetailsLink;
    public $DetailsLink;

    public $errors;
    public $newerror;

    public $helpTexts;
    public $helpKey;
    public $helpDIV;

    public function __construct($keycol, $table, $icon, $showid = true, $drawDetailsLink = false, $DetailsLink = '', $deleteCallback = null)
    {
        $this->keycol          = $keycol;
        $this->table           = $table;
        $this->icon            = $icon;
        $this->showid          = $showid;
        $this->drawDetailsLink = $drawDetailsLink;
        $this->DetailsLink     = $DetailsLink;
        $this->helpKey         = '';
        $this->deleteCallback  = $deleteCallback;
    }

    public function setHelp($div, $key, $texts)
    {
        $this->helpDIV   = $div;
        $this->helpKey   = $key;
        $this->helpTexts = $texts;

        $returnstr = '';

        if ('' != $this->helpKey) {
            $returnstr .= "<script type='text/javascript'>\n";
            $returnstr .= "var texts = new Array();\n";
            foreach (array_keys($this->helpTexts) as $key) {
                $value = $this->helpTexts[$key];
                // $value = nl2br(htmlspecialchars($this->helpTexts[$key]));
                $value = str_replace('"', "'", $value);
                // $value = preg_replace("/\"/", "'", $value);
                $value = preg_replace("/[\r\n]/", ' ', $value);
                $returnstr .= 'texts["'.$key.'"] = "'.$value."\";\n";
            }

            $returnstr .= "\n\nfunction showHelp (keyname) {\n";
            $returnstr .= "document.getElementById('".$this->helpDIV."').innerHTML=texts[keyname];\n";
            $returnstr .= "document.getElementById('".$this->helpDIV."').style.visibility='visible';\n";
            $returnstr .= "}\n";
            $returnstr .= "\n\nfunction hideHelp () {\n";
            $returnstr .= "document.getElementById('".$this->helpDIV."').style.visibility='hidden';\n";
            $returnstr .= "}\n";
            $returnstr .= "</script>\n";

            $returnstr .= '<div class="helpwindow" ID="'.$this->helpDIV.'">No help text available</div>';
        }

        return $returnstr;
    }

    public function update()
    {
        global $db;

        $okcols = 0;
        foreach ($this->columns as $col) {
            $value = (!empty($_POST["new_$col->name"])) ? mystripslashes($_POST["new_$col->name"]) : '';
            //  legacy code that should have never been here. these should never be html-escaped in the db.
            //  if there's a problem with removing this, it needs to be fixed on the web/display end
            //  -psychonic
            //
            /*
            if ( $col->name != 'rcon_password' && $col->type != 'password' && $col->name != 'pattern')
            {
                $value = htmlspecialchars($value);
            }
            */

            if ('' != $value) {
                if ('ipaddress' == $col->type && !preg_match('/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/', $value)) {
                    $this->errors[] = "Column '$col->title' requires a valid IP address for new row";
                    $this->newerror = true;
                    ++$okcols;
                } else {
                    if ($qcols) {
                        $qcols .= ', ';
                    }
                    $qcols .= $col->name;

                    if ($qvals) {
                        $qvals .= ', ';
                    }

                    if ('password' == $col->type && 'rcon_password' != $col->name) {
                        $value = md5($value);
                    }
                    $qvals .= "'".$db->escape($value)."'";

                    if ('select' != $col->type && 'hidden' != $col->type && $value != $col->datasource) {
                        ++$okcols;
                    }
                }
            } elseif ($col->required) {
                $this->errors[] = "Required column '$col->title' must have a value for new row";
                $this->newerror = true;
            }
        }

        if ($okcols > 0 && !$this->errors) {
            $db->query("
					INSERT INTO
						$this->table
						(
							$qcols
						)
					VALUES
					(
						$qvals
					)");
        } elseif (0 == $okcols) {
            $this->errors   = [];
            $this->newerror = false;
        }

        if (!is_array($_POST['rows'])) {
            return true;
        }

        foreach ($_POST['rows'] as $row) {
            if (!empty($_POST[$row.'_delete'])) {
                if (!empty($this->deleteCallback) && is_callable($this->deleteCallback)) {
                    call_user_func($this->deleteCallback, $row);
                }

                $db->query("
					DELETE FROM
						$this->table
					WHERE
						$this->keycol='".$db->escape($row)."'
				");
            } else {
                $rowerror = false;

                $query = "UPDATE $this->table SET ";
                $i     = 0;
                foreach ($this->columns as $col) {
                    if ('readonly' == $col->type) {
                        continue;
                    }

                    $value = (!empty($_POST[$row.'_'.$col->name])) ? mystripslashes($_POST[$row.'_'.$col->name]) : null;

                    //  legacy code that should have never been here. these should never be html-escaped in the db.
                    //  if there's a problem with removing this, it needs to be fixed on the web/display end
                    //  -psychonic
                    //
                    /*
                    if ( $col->name != 'rcon_password' && $col->type != 'password' && $col->name != 'pattern')
                    {
                        $value = htmlspecialchars($value);
                    }
                    */

                    if ('checkbox' == $col->type && $value == ('' || null)) {
                        $value = '0';
                    }

                    if ('password' == $col->type && '(encrypted)' == $value) {
                        continue;
                    }

                    if ('' == $value && $col->required) {
                        $this->errors[] = "Required column '$col->title' must have a value for row '$row'";
                        $rowerror       = true;
                    } elseif ('ipaddress' == $col->type && !preg_match("/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/", $value)) {
                        $this->errors[] = "Column '$col->title' requires a valid IP address for row '$row'";
                        $rowerror       = true;
                    }

                    if ($i > 0) {
                        $query .= ', ';
                    }

                    if ('password' == $col->type && 'rcon_password' != $col->name) {
                        $query .= $col->name."='".md5($value)."'";
                    } else {
                        $query .= $col->name."='".$db->escape($value)."'";
                    }
                    ++$i;
                }
                $query .= " WHERE $this->keycol='".$db->escape($row)."'";

                if (!$rowerror) {
                    $db->query($query);
                }
            }
        }

        if ($this->error()) {
            return false;
        }

        return true;
    }

    public function draw($result, $draw_new = true): void
    {
        global $g_options, $db;

        ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr valign="top" class="table_border">
	<td><table width="100%" border="0" cellspacing="1" cellpadding="4">

		<tr valign="bottom" class="head">
<?php
                echo '<td></td>';

        if ($this->showid) {
            ?>
			<td align="right" class="fSmall"><?php
                        echo 'ID';
            ?></td>
<?php
        }

        foreach ($this->columns as $col) {
            if ('hidden' == $col->type) {
                continue;
            }
            echo '<td class="fSmall">'.$col->title."</td>\n";
        }

        if ($this->drawDetailsLink) {
            ?>
			<td align="right" class="fSmall"><?php
                        echo '';
            ?></td>
<?php
        }

        ?>
			<td align="center" class="fSmall"><?php
                echo 'Delete';
        ?></td>
		</tr>

<?php
                while ($rowdata = $db->fetch_array($result)) {
                    echo "\n<tr>\n";
                    echo '<td align="center" class="bg1">';
                    if (file_exists(IMAGE_PATH."/$this->icon.gif")) {
                        echo '<img src="'.IMAGE_PATH."/$this->icon.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"\" />";
                    } else {
                        echo '<img src="'.IMAGE_PATH.'/server.gif" width="16" height="16" border="0" alt="" />';
                    }
                    echo "</td>\n";

                    if ($this->showid) {
                        echo '<td align="right" class="bg2 fSmall">'.$rowdata[$this->keycol]."</td>\n";
                    }

                    $this->drawfields($rowdata, false, false);

                    if ($this->drawDetailsLink) {
                        global $gamecode;
                        ?>
			<td align="center" class="bg2 fSmall"><?php
                                        echo "<a href='".$g_options['scripturl']."?mode=admin&amp;game=$gamecode&amp;task=".$this->DetailsLink.'&amp;key='.$rowdata[$this->keycol]."'><b>CONFIGURE</b></a>";
                        ?></td>
<?php
                    }

                    ?>
<td align="center" class="bg2"><input type="checkbox" name="<?php echo $rowdata[$this->keycol]; ?>_delete" value="1" /></td>
<?php echo "</tr>\n\n";
                }
        ?>

<tr>
<?php
                if ($draw_new) {
                    echo '<td class="bg1 fSmall" align="center">'."new</td>\n";

                    if ($this->showid) {
                        echo '<td class="bg2 fSmall" align="right">'."&nbsp;</td>\n";
                    }

                    if ($this->newerror) {
                        $this->drawfields($_POST, true, true);
                    } else {
                        $this->drawfields([], true);
                    }

                    echo "<td class=\"bg1\"></td>\n";
                }
        ?>
</tr>

		</table></td>
</tr>

</table><br /><br />
<?php
    }

    public function drawfields($rowdata = [], $new = false, $stripslashes = false): void
    {
        global $g_options, $db;

        $i = 0;
        foreach ($this->columns as $col) {
            if ($new) {
                $keyval              = 'new';
                $rowdata[$col->name] = $rowdata["new_$col->name"];
                if ($stripslashes) {
                    $rowdata[$col->name] = mystripslashes($rowdata[$col->name]);
                }
            } else {
                $keyval = $rowdata[$this->keycol];
                if ($stripslashes) {
                    $keyval = mystripslashes($keyval);
                }
            }

            if ('hidden' != $col->type) {
                echo '<td class="bg1">';
            }

            if (0 == $i && !$new) {
                echo '<input type="hidden" name="rows[]" value="'.htmlspecialchars($keyval).'" />';
            }

            if ($col->maxlength < 1) {
                $col->maxlength = '';
            }

            switch ($col->type) {
                case 'select':
                    unset($coldata);

                    // for manual datasource in format "key/value;key/value" or "key;key"
                    foreach (explode(';', $col->datasource) as $v) {
                        $sections = preg_match_all('/\//', $v, $dsaljfdsaf);
                        if (2 == $sections) {
                            // for SQL datasource in format "table.column/keycolumn/where"
                            [$col_table, $col_col]           = explode('.', $v);
                            [$col_col, $col_key, $col_where] = explode('/', $col_col);
                            if ($col_where) {
                                $col_where = "WHERE $col_where";
                            }
                            $col_result = $db->query("SELECT $col_key, $col_col FROM $col_table $col_where ORDER BY $col_col");
                            $coldata    = [];
                            while ([$a, $b] = $db->fetch_row($col_result)) {
                                $coldata[$a] = $b;
                            }
                        } elseif ($sections > 0) {
                            [$a, $b]     = explode('/', $v);
                            $coldata[$a] = $b;
                        } else {
                            $coldata[$v] = $v;
                        }
                    }

                    if ($col->width) {
                        $width = ' style="width:'.$col->width * 5 .'px"';
                    } else {
                        $width = '';
                    }

                    echo '<select name="'.$keyval."_$col->name\"$width>\n";

                    if (!$col->required) {
                        echo "<option value=\"\"></option>\n";
                    }

                    $gotcval = false;

                    foreach ($coldata as $k => $v) {
                        if ($rowdata[$col->name] == $k) {
                            $selected = ' selected="selected"';
                            $gotcval  = true;
                        } else {
                            $selected = '';
                        }

                        echo "<option value=\"$k\"$selected>$v</option>\n";
                    }

                    if (!$gotcval) {
                        echo '<option value="'.$rowdata[$col->name].'" selected="selected">'.$rowdata[$col->name]."</option>\n";
                    }

                    echo '</select>';
                    break;

                case 'checkbox':
                    $selectedval = '1';
                    $value       = $rowdata[$col->name];

                    if ($value == $selectedval) {
                        $selected = ' checked="checked"';
                    } else {
                        $selected = '';
                    }

                    echo '<center><input type="checkbox" name="'.$keyval."_$col->name\" value=\"$selectedval\"$selected /></center>";
                    break;

                case 'hidden':
                    echo '<input type="hidden" name="'.$keyval."_$col->name\" value=\"".htmlspecialchars($col->datasource).'" />';
                    break;

                case 'readonly':
                    if (!$new) {
                        echo html_entity_decode($rowdata[$col->name]);
                        break;
                    }
                    /* else fall through to default */

                    // no break
                default:
                    $onclick = '';
                    if ('password' == $col->type) {
                        $onclick = " onclick=\"if (this.value == '(encrypted)') this.value='';\"";
                    }

                    if ('' != $col->datasource && !isset($rowdata[$col->name])) {
                        $value = $col->datasource;
                    } else {
                        $value = $rowdata[$col->name];
                    }

                    $onClick = '';
                    if (!empty($this->helpKey) && !empty($rowdata[$this->helpKey])) {
                        $onClick = "onmouseover=\"javascript:showHelp('".strtolower($rowdata[$this->helpKey])."')\" onmouseout=\"javascript:hideHelp()\"";
                    }

                    $input_value = (!empty($value)) ? htmlentities(html_entity_decode($value), ENT_COMPAT, 'UTF-8') : '';

                    echo "<input $onClick type=\"text\" name=\"".$keyval."_$col->name\" size=$col->width ".'value="'.$input_value.'" class="textbox"'." maxlength=\"$col->maxlength\"$onclick />";
                    // doing htmlentities on something that we just decoded is because we need to encode them when we fill out a form, but we don't want to double encode them (some items like rcon are not encoded at all - but server names are)
            }

            if ('hidden' != $col->type) {
                echo "</td>\n";
            }

            ++$i;
        }
    }

    public function error()
    {
        if (is_array($this->errors)) {
            return implode("<br /><br />\n\n", $this->errors);
        } else {
            return false;
        }
    }
}

class EditListColumn
{
    public $name;
    public $title;
    public $width;
    public $required;
    public $type;
    public $datasource;
    public $maxlength;

    public function __construct($name, $title, $width = 20, $required = false, $type = 'text', $datasource = '', $maxlength = 0)
    {
        $this->name       = $name;
        $this->title      = $title;
        $this->width      = $width;
        $this->required   = $required;
        $this->type       = $type;
        $this->datasource = $datasource;
        $this->maxlength  = intval($maxlength);
    }
}

class PropertyPage
{
    public $table;
    public $keycol;
    public $keyval;
    public $propertygroups = [];

    public function __construct($table, $keycol, $keyval, $groups)
    {
        $this->table          = $table;
        $this->keycol         = $keycol;
        $this->keyval         = $keyval;
        $this->propertygroups = $groups;
    }

    public function draw($data): void
    {
        foreach ($this->propertygroups as $group) {
            $group->draw($data);
        }
    }

    public function update(): void
    {
        global $db;

        $setstrings = [];
        foreach ($this->propertygroups as $group) {
            foreach ($group->properties as $prop) {
                if ('name' == $prop->name) {
                    $value           = $_POST[$prop->name];
                    $search_pattern  = ['/script/i', '/;/', '/%/'];
                    $replace_pattern = ['', '', ''];
                    $value           = preg_replace($search_pattern, $replace_pattern, $value);
                    $setstrings[]    = $prop->name."='".$value."'";
                } else {
                    $setstrings[] = $prop->name."='".valid_request($_POST[$prop->name], 0)."'";
                }
            }
        }

        $db->query('
				UPDATE
					'.$this->table.'
				SET
					'.implode(",\n", $setstrings).'
				WHERE
					'.$this->keycol."='".$db->escape($this->keyval)."'
			");
    }
}

class PropertyPage_Group
{
    public $title      = '';
    public $properties = [];

    public function __construct($title, $properties)
    {
        $this->title      = $title;
        $this->properties = $properties;
    }

    public function draw($data): void
    {
        global $g_options;
        ?>
<b><?php echo $this->title; ?></b><br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr valign="top">
	<td><table width="100%" border="0" cellspacing="1" cellpadding="4">
<?php
                foreach ($this->properties as $prop) {
                    $prop->draw($data[$prop->name]);
                }
        ?>
		</table></td>
</tr>

</table><br /><br />
<?php
    }
}

class PropertyPage_Property
{
    public $name;
    public $title;
    public $type;

    public function __construct($name, $title, $type, $datasource = '')
    {
        $this->name       = $name;
        $this->title      = $title;
        $this->type       = $type;
        $this->datasource = $datasource;
    }

    public function draw($value): void
    {
        global $g_options;
        ?>
<tr style="vertical-align:middle;">
	<td class="bg1" style="width:45%;"><?php
                echo $this->title.':';
        ?></td>
	<td class="bg1" style="width:55%;"><?php
                switch ($this->type) {
                    case 'textarea':
                        echo "<textarea name=\"$this->name\" cols=35 rows=4 wrap=\"virtual\">".htmlspecialchars($value).'</textarea>';
                        break;

                    case 'select':
                        // for manual datasource in format "key/value;key/value" or "key;key"
                        foreach (explode(';', $this->datasource) as $v) {
                            if (preg_match('/\//', $v)) {
                                [$a, $b]     = explode('/', $v);
                                $coldata[$a] = $b;
                            } else {
                                $coldata[$v] = $v;
                            }
                        }

                        echo getSelect($this->name, $coldata, $value);
                        break;

                    default:
                        echo "<input type=\"text\" name=\"$this->name\" size=35 value=\"".htmlspecialchars($value).'" class="textbox" />';
                        break;
                }
        ?>
</td>
</tr>
<?php
    }
}

function message($icon, $msg)
{
    global $g_options;
    ?>
		<table width="60%" border="0" cellspacing="0" cellpadding="0">

		<tr valign="top">
			<td width="40"><img src="<?php echo IMAGE_PATH."/$icon"; ?>.gif" width="16" height="16" border="0" hspace="5" alt="" /></td>
			<td width="100%"><?php
        echo "<b>$msg</b>";
    ?></td>
		</tr>

		</table><br /><br />
<?php
}

$auth = new Auth();
if (false === $auth->ok) {
    return;
}

pageHeader(['Admin'], ['Admin' => '']);

$selTask = valid_request($_GET['task'], false);
$selGame = valid_request($_GET['game'], false);
?>

<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">

<tr valign="top">
	<td><?php

// General Settings
$admintasks['options']    = new AdminTask('HLstatsX:CE Settings', 80);
$admintasks['adminusers'] = new AdminTask('Admin Users', 100);
$admintasks['games']      = new AdminTask('Games', 80);
$admintasks['hostgroups'] = new AdminTask('Host Groups', 100);
$admintasks['clantags']   = new AdminTask('Clan Tag Patterns', 80);
$admintasks['voicecomm']  = new AdminTask('Manage Voice Servers', 80);

// Game Settings
$admintasks['newserver']                     = new AdminTask('Add Server', 80, 'game');
$admintasks['servers']                       = new AdminTask('Edit Servers', 80, 'game');
$admintasks['serversettings']                = new AdminTask('&nbsp;&nbsp;&nbsp;&gt;&gt;&nbsp;Server Details', 80, 'game');
$admintasks['actions']                       = new AdminTask('Actions', 80, 'game');
$admintasks['teams']                         = new AdminTask('Teams', 80, 'game');
$admintasks['roles']                         = new AdminTask('Roles', 80, 'game');
$admintasks['weapons']                       = new AdminTask('Weapons', 80, 'game');
$admintasks['awards_weapons']                = new AdminTask('Weapon Awards', 80, 'game');
$admintasks['awards_plyractions']            = new AdminTask('Plyr Action Awards', 80, 'game');
$admintasks['awards_plyrplyractions']        = new AdminTask('PlyrPlyr Action Awards', 80, 'game');
$admintasks['awards_plyrplyractions_victim'] = new AdminTask('PlyrPlyr Action Awards (Victim)', 80, 'game');
$admintasks['ranks']                         = new AdminTask('Ranks (triggered by Kills)', 80, 'game');
$admintasks['ribbons']                       = new AdminTask('Ribbons (triggered by Awards)', 80, 'game');

// Tools
$admintasks['tools_perlcontrol'] = new AdminTask('HLstatsX: CE Daemon Control', 80, 'tool', 'Reload or stop your HLX: CE Daemons');
$admintasks['tools_editdetails'] = new AdminTask('Edit Player or Clan Details', 80, 'tool', 'Edit a player or clan\'s profile information.');
$admintasks['tools_adminevents'] = new AdminTask('Admin-Event History', 80, 'tool', 'View event history of logged Rcon commands and Admin Mod messages.');
$admintasks['tools_ipstats']     = new AdminTask('Host Statistics', 80, 'tool', 'See which ISPs your players are using.');
$admintasks['tools_optimize']    = new AdminTask('Optimize Database', 100, 'tool', 'This operation tells the MySQL server to clean up the database tables, optimizing them for better performance. It is recommended that you run this at least once a month.');
// $admintasks['tools_synchronize'] = new AdminTask('Synchronize Statistics', 80, 'tool', 'Sychronize all players with the offical global ELstatsNEO banlist with catched VAC cheaters.');
$admintasks['tools_resetdbcollations'] = new AdminTask('Reset All DB Collations to UTF8', 100, 'tool', 'Reset DB Collations to UTF-8 if you receive collation errors after an upgrade from another HLstats(X)-based system.');

// Sub-Tools
$admintasks['tools_editdetails_player'] = new AdminTask('Edit Player Details', 80, 'subtool', 'Edit a player\'s profile information.');
$admintasks['tools_editdetails_clan']   = new AdminTask('Edit Clan Details', 80, 'subtool', 'Edit a clan\'s profile information.');

// Reset Tools
$admintasks['tools_reset']   = new AdminTask('Full or Partial Reset', 100, 'tool', 'Resets chosen data globally or for selected game', 'reset');
$admintasks['tools_reset_2'] = new AdminTask('Clean up Statistics', 100, 'tool', 'Delete all inactive players, clans and corresponding events from the database.', 'reset');

// Game Settings Tools
$admintasks['tools_settings_copy'] = new AdminTask('Duplicate Game settings', 80, 'tool', 'Duplicate a whole game settings tree to split servers of same gametype', 'settingstool');

// Show Tool
if (!empty($admintasks[$selTask]) && ('tool' == $admintasks[$selTask]->type || 'subtool' == $admintasks[$selTask]->type)) {
    $task = $admintasks[$selTask];

    $code = $selTask;
    ?>
&nbsp;<img src="<?php echo IMAGE_PATH; ?>/downarrow.gif" width="9" height="6" alt="" /><b>&nbsp;<a href="<?php echo $g_options['scripturl']; ?>?mode=admin">Tools</a></b><br />
<img src="<?php echo IMAGE_PATH; ?>/spacer.gif" width="1" height="8" border="0" alt="" /><br />

<?php
        include PAGE_PATH."/admintasks/$code.php";
} else {
    // General Settings

    ?>
&nbsp;<img src="<?php echo IMAGE_PATH; ?>/downarrow.gif" width="9" height="6" alt="" /><b>&nbsp;General Settings</b><br /><br />
<?php
        foreach ($admintasks as $code => $task) {
            if ($auth->userdata['acclevel'] >= $task->acclevel && 'general' == $task->type) {
                if ($selTask == $code) {
                    ?>
&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo IMAGE_PATH; ?>/downarrow.gif" width="9" height="6" alt="" /><b>&nbsp;<a href="<?php echo $g_options['scripturl']; ?>?mode=admin" name="<?php echo $code; ?>"><?php echo $task->title; ?></a></b><br /><br />

<form method="post" action="<?php echo $g_options['scripturl']; ?>?mode=admin&amp;task=<?php echo $code; ?>#<?php echo $code; ?>">

<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr>
	<td width="2%">&nbsp;</td>
	<td width="98%"><?php
                                    include PAGE_PATH."/admintasks/$code.php";
                    ?></td>
</tr>

</table><br /><br />
</form>
<?php
                } else {
                    ?>
&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo IMAGE_PATH; ?>/rightarrow.gif" width="6" height="9" alt="" /><b>&nbsp;<a href="<?php echo $g_options['scripturl']; ?>?mode=admin&amp;task=<?php echo $code; ?>#<?php echo $code;
                    ?>"><?php echo $task->title; ?></a></b><br /><br /> <?php
                }
            }
        }
    ?>
	
&nbsp;<img src="<?php echo IMAGE_PATH; ?>/downarrow.gif" width="9" height="6" alt="" /><b>&nbsp;Game Settings</b><br /><br />
<?php
        $gamesresult = $db->query("
			SELECT
				name,
				code
			FROM
				hlstats_Games
			WHERE
				hidden = '0'
			ORDER BY
				name ASC
			;
		");

    while ($gamedata = $db->fetch_array($gamesresult)) {
        $gamename = $gamedata['name'];
        $gamecode = $gamedata['code'];

        if ($gamecode == $selGame) {
            ?>
&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo IMAGE_PATH; ?>/downarrow.gif" width="9" height="6" alt="" /><b>&nbsp;<a href="<?php echo $g_options['scripturl']; ?>?mode=admin" name="game_<?php echo $gamecode; ?>"><?php echo $gamename; ?></a></b> (<?php echo $gamecode; ?>)<br /><br /> <?php
                        foreach ($admintasks as $code => $task) {
                            if ($auth->userdata['acclevel'] >= $task->acclevel && 'game' == $task->type) {
                                if ($selTask == $code) {
                                    ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo IMAGE_PATH; ?>/downarrow.gif" width="9" height="6" alt="" /><b>&nbsp;<a href="<?php echo $g_options['scripturl']; ?>?mode=admin&amp;game=<?php echo $gamecode; ?>" name="<?php echo $code; ?>"><?php echo $task->title; ?></a></b><br /><br />

<form method="post" name="<?php echo $code; ?>form" action="<?php echo $g_options['scripturl']; ?>?mode=admin&amp;game=<?php echo $gamecode; ?>&task=<?php echo $code; ?>#<?php echo $code; ?>">

<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr>
	<td width="10%">&nbsp;</td>
	<td width="90%"><?php
                                                            include PAGE_PATH."/admintasks/$code.php";
                                    ?></td>
</tr>

</table><br /><br />
</form>
<?php
                                } elseif ('serversettings' != $code) {
                                    ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo IMAGE_PATH; ?>/rightarrow.gif" width="6" height="9" alt="" /><b>&nbsp;<a href="<?php echo $g_options['scripturl']; ?>?mode=admin&amp;game=<?php echo $gamecode; ?>&task=<?php echo $code; ?>#<?php echo $code; ?>"><?php echo $task->title; ?></a></b><br /><br /> <?php
                                }
                            }
                        }
        } else {
            ?>
&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo IMAGE_PATH; ?>/rightarrow.gif" width="6" height="9" alt="" /><b>&nbsp;<a href="<?php echo $g_options['scripturl']; ?>?mode=admin&amp;game=<?php echo $gamecode; ?>#game_<?php echo $gamecode; ?>"><?php echo $gamename; ?></a></b> (<?php echo $gamecode; ?>)<br /><br /> <?php
        }
    }
}
echo "</td>\n";

if (!$selTask || !$admintasks[$selTask]) {
    echo '<td width="50%">';
    ?>
&nbsp;<img src="<?php echo IMAGE_PATH; ?>/downarrow.gif" width="9" height="6" alt="" /><b>&nbsp;Tools</b>

<ul>
<?php
        foreach ($admintasks as $code => $task) {
            if ($auth->userdata['acclevel'] >= $task->acclevel && 'tool' == $task->type) {
                ?>	<li><b><a href="<?php echo $g_options['scripturl']; ?>?mode=admin&amp;task=<?php echo $code; ?>"><?php echo $task->title; ?></a></b><br />
		<?php echo $task->description; ?><br /><br />
	</li>
<?php
            }
        }
    ?>
</ul>
<?php
        echo '</td>';
}
?>
</tr>

</table>

<?php
if (isset($footerscript)) {
    echo $footerscript;
}
?>
