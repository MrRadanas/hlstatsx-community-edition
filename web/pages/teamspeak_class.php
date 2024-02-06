<?php

// Teamspeak Display Preview Release 3
// Copyright (C) 2005  Guido van Biemen (aka MrGuide@NL)
//
// This program is free software; you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 2 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

class teamspeakDisplayClass
{
    // Removes subsequent end of line charachter from the right part of a string
    public function _stripEOL($evalString)
    {
        $newLen = strlen($evalString);
        while (("\r" == substr($evalString, $newLen - 1, 1)) || ("\n" == substr($evalString, $newLen - 1, 1))) {
            --$newLen;
        }

        return substr($evalString, 0, $newLen);
    }

    // Opens a connection to the teamspeak server
    public function _openConnection(&$socket, $host, $port, $timeout)
    {
        @$socket = fsockopen($host, $port, $errno, $errstr, $timeout);
        if ($socket and ('[TS]' == $this->_stripEOL(fgets($socket, 4096)))) {
            return true;
        } else {
            return false;
        }
    }

    // Closes the connection to the Teamspeak server
    public function _closeConnection($socket): void
    {
        fputs($socket, "quit\n");
        fclose($socket);
    }

    // Returns the part of evalString until a tab (or the end of a string) and deletes the
    // returned part from evalString (including the possible tab that follows)
    public function _stripPartFromString(&$evalString)
    {
        $pos = strpos($evalString, "\t");
        if (is_integer($pos)) {
            $result     = substr($evalString, 0, $pos);
            $evalString = substr($evalString, $pos + 1);
        } else {
            $result     = $evalString;
            $evalString = '';
        }

        return $result;
    }

    // Removes the surrounding quotes from evalString and returns the result
    public function _stripQuotes($evalString)
    {
        if (0 == strpos($evalString, '"')) {
            $evalString = substr($evalString, 1, strlen($evalString) - 1);
        }
        if (strrpos($evalString, '"') == strlen($evalString) - 1) {
            $evalString = substr($evalString, 0, strlen($evalString) - 1);
        }

        return $evalString;
    }

    // Request, read and parse the server info:
    public function _getServerInfo($socket)
    {
        fputs($socket, "si\n");
        $result = [];
        do {
            $buffer = $this->_stripEOL(fgets($socket, 4096));
            if (('OK' != $buffer) && ('ERROR' != strtoupper(substr($buffer, 0, 5)))) {
                $pos = strpos($buffer, '=');
                if (false !== $pos) {
                    $result[substr($buffer, 0, $pos)] = substr($buffer, $pos + 1);
                }
            }
        } while (('OK' != $buffer) && ('ERROR' != strtoupper(substr($buffer, 0, 5))) && (!feof($socket)));

        return $result;
    }

    public function _setPlayerDisplayImage(&$playerInfo): void
    {
        // Determine the right userpicture:
        if (($playerInfo['attribute'] & 8) == 8) {
            $playerImage = 'away';
        } elseif (($playerInfo['attribute'] & 32) == 32) {
            $playerImage = 'mutespeakers';
        } elseif (($playerInfo['attribute'] & 16) == 16) {
            $playerImage = 'mutemicrophone';
        } elseif (($playerInfo['attribute'] & 1) == 1) {
            $playerImage = 'channelcommander';
        } else {
            $playerImage = 'normal';
        }
        $playerInfo['displayimage'] = $playerImage;
    }

    public function _setPlayerDisplayName(&$playerInfo): void
    {
        // Determine the player status (U = Unregistered, R = Registered, SA = Server Admin,
        // CA = Channel Admin, AO = Auto-Operator, AV = Auto-Voice, O = Operator, V = Voice)
        if (($playerInfo['userstatus'] & 4) == 4) {
            $playerstatus = 'R';
        } else {
            $playerstatus = 'U';
        }
        if (($playerInfo['userstatus'] & 1) == 1) {
            $playerstatus .= ' SA';
        }
        if (($playerInfo['privileg'] & 1) == 1) {
            $playerstatus .= ' CA';
        }
        if (($playerInfo['privileg'] & 8) == 8) {
            $playerstatus .= ' AO';
        }
        if (($playerInfo['privileg'] & 16) == 16) {
            $playerstatus .= ' AV';
        }
        if (($playerInfo['privileg'] & 2) == 2) {
            $playerstatus .= ' O';
        }
        if (($playerInfo['privileg'] & 4) == 4) {
            $playerstatus .= ' V';
        }
        if (($playerInfo['attribute'] & 64) == 64) {
            $playerstatus .= ' Rec';
        }

        // Determine the player attributes to be listed behind the player status (WV = Want Voice)
        if (($playerInfo['attribute'] & 2) == 2) {
            $playerattributes = ' WV';
        } else {
            $playerattributes = '';
        }

        $playerInfo['displayname'] = $playerInfo['playername'].' ('.$playerstatus.')'.$playerattributes;
    }

    public function _getPlayerList($socket)
    {
        // Request, read and parse the player list
        fputs($socket, "pl\n");
        $buffer = $this->_stripEOL(fgets($socket, 4096));
        $result = [];
        if ('ERROR' == strtoupper(substr($buffer, 0, 5))) {
            return $result;
        }
        do {
            $buffer = $this->_stripEOL(fgets($socket, 4096));
            if (('OK' != $buffer) && ('ERROR' != strtoupper(substr($buffer, 0, 5)))) {
                $playerid          = $this->_stripPartFromString($buffer);
                $result[$playerid] = [
                    'playerid'        => $playerid,
                    'channelid'       => $this->_stripPartFromString($buffer),
                    'receivedpackets' => $this->_stripPartFromString($buffer),
                    'receivedbytes'   => $this->_stripPartFromString($buffer),
                    'sentpackets'     => $this->_stripPartFromString($buffer),
                    'sentbytes'       => $this->_stripPartFromString($buffer),
                    'paketlost'       => $this->_stripPartFromString($buffer) / 100,
                    'pingtime'        => $this->_stripPartFromString($buffer),
                    'totaltime'       => $this->_stripPartFromString($buffer),
                    'idletime'        => $this->_stripPartFromString($buffer),
                    'privileg'        => $this->_stripPartFromString($buffer),
                    'userstatus'      => $this->_stripPartFromString($buffer),
                    'attribute'       => $this->_stripPartFromString($buffer),
                    'ip'              => $this->_stripPartFromString($buffer),
                    'playername'      => $this->_stripQuotes($this->_stripPartFromString($buffer)),
                    'loginname'       => $this->_stripQuotes($this->_stripPartFromString($buffer)),
                ];
                $this->_setPlayerDisplayImage($result[$playerid]);
                $this->_setPlayerDisplayName($result[$playerid]);
            }
        } while (('OK' != $buffer) && ('ERROR' != strtoupper(substr($buffer, 0, 5))) && (!feof($socket)));

        return $result;
    }

    public function _getLimitedPlayerList($socket, $channelList)
    {
        $playerList = $this->_getPlayerList($socket);
        $result     = [];
        foreach ($playerList as $playerInfo) {
            foreach ($channelList as $channelInfo) {
                if ($playerInfo['channelid'] == $channelInfo['channelid']) {
                    $result[$playerInfo['playerid']] = $playerInfo;
                }
            }
        }

        return $result;
    }

    public function _setChannelDisplayName(&$channelInfo): void
    {
        if (-1 != $channelInfo['parent']) {
            $channelInfo['displayname'] = $channelInfo['channelname'];
        } else {
            // Determine the channel status (U = Unregisterd, R = Registered, M = Moderated,
            // P = Passworded, S = Sub-channels, D = Default).
            if (($channelInfo['flags'] & 1) == 1) {
                $channelstatus = 'U';
            } else {
                $channelstatus = 'R';
            }
            if (($channelInfo['flags'] & 2) == 2) {
                $channelstatus .= 'M';
            }
            if (($channelInfo['flags'] & 4) == 4) {
                $channelstatus .= 'P';
            }
            if (($channelInfo['flags'] & 8) == 8) {
                $channelstatus .= 'S';
            }
            if (($channelInfo['flags'] & 16) == 16) {
                $channelstatus .= 'D';
            }
            $channelInfo['displayname'] = $channelInfo['channelname'].' ('.$channelstatus.')';
        }
    }

    public function _getChannelList($socket)
    {
        // Request, read and parse the channel list
        fputs($socket, "cl\n");
        $buffer = $this->_stripEOL(fgets($socket, 4096));
        $result = [];
        if ('ERROR' == strtoupper(substr($buffer, 0, 5))) {
            return $result;
        }
        do {
            $buffer = $this->_stripEOL(fgets($socket, 4096));
            if (('OK' != $buffer) && ('ERROR' != strtoupper(substr($buffer, 0, 5)))) {
                $channelid          = $this->_stripPartFromString($buffer);
                $result[$channelid] = [
                    'channelid'   => $channelid,
                    'codec'       => $this->_stripPartFromString($buffer),
                    'parent'      => $this->_stripPartFromString($buffer),
                    'order'       => $this->_stripPartFromString($buffer),
                    'maxplayers'  => $this->_stripPartFromString($buffer),
                    'channelname' => $this->_stripQuotes($this->_stripPartFromString($buffer)),
                    'flags'       => $this->_stripPartFromString($buffer),
                    'password'    => $this->_stripPartFromString($buffer),
                    'topic'       => $this->_stripQuotes($this->_stripPartFromString($buffer)),
                ];
                $this->_setChannelDisplayName($result[$channelid]);
            }
        } while (('OK' != $buffer) && ('ERROR' != strtoupper(substr($buffer, 0, 5))) && (!feof($socket)));

        return $result;
    }

    public function _getLimitedChannelList($socket, $limitChannel)
    {
        $channelList = $this->_getChannelList($socket);
        $result      = [];
        foreach ($channelList as $channelInfo) {
            if (-1 == $channelInfo['parent']) {
                if ($channelInfo['channelname'] == $limitChannel) {
                    $result[$channelInfo['channelid']] = $channelInfo;
                    foreach ($channelList as $subChannelInfo) {
                        if ($subChannelInfo['parent'] == $channelInfo['channelid']) {
                            $result[$subChannelInfo['channelid']] = $subChannelInfo;
                        }
                    }
                }
            }
        }

        return $result;
    }

    public function _selectServer($socket, $port)
    {
        // Request the server to select the server which is hosted on  the port set in serverUDPPort
        fputs($socket, 'sel '.$port."\n");

        // Read server response on request to select a server
        return 'OK' == $this->_stripEOL(fgets($socket, 4096));
    }

    // Queries the Teamspeak server
    public function queryTeamspeakServerEx($settings)
    {
        $result = [];

        // Try to establish a connection to the teamspeak server
        if (!$this->_openConnection($socket, $settings['serveraddress'], $settings['serverqueryport'], 0.3)) {
            $result['queryerror'] = 1;
        } elseif (!$this->_selectServer($socket, $settings['serverudpport'])) {
            $result['queryerror'] = 2;
            $this->_closeConnection($socket);
        } else {
            $result['queryerror']  = 0;
            $result['serverinfo']  = $this->_getServerInfo($socket);
            $result['channellist'] = ('' == $settings['limitchannel']) ? $this->_getChannelList($socket) : $this->_getLimitedChannelList($socket, $settings['limitchannel']);
            $result['playerlist']  = ('' == $settings['limitchannel']) ? $this->_getPlayerList($socket) : $this->_getLimitedPlayerList($socket, $result['channellist']);
            $this->_closeConnection($socket);
        }

        return $result;
    }

    public function queryTeamspeakServer($serverAddress, $serverUDPPort, $serverQueryPort)
    {
        $settings                    = $this->getDefaultSettings();
        $settings['serveraddress']   = $serverAddress;
        $settings['serverudpport']   = $serverUDPPort;
        $settings['serverqueryport'] = $serverQueryPort;

        return $this->queryTeamspeakServerEx($settings);
    }

    public function _orderAlphaGetString($string)
    {
        $lowerstring = strtolower($string);
        $result      = '';
        for ($i = 0; $i < strlen($lowerstring); ++$i) {
            if (false !== strpos('0123456789abcdefghijklmnopqrstuvwxyz', (string) substr($lowerstring, $i, 1))) {
                $result .= substr($lowerstring, $i, 1);
            }
        }

        return $result;
    }

    public function _orderAlpha($str1, $str2)
    {
        return strcmp($this->_orderAlphaGetString($str1), $this->_orderAlphaGetString($str2));
    }

    public function _compareChannel($a, $b)
    {
        if ($a['order'] != $b['order']) {
            return ($a['order'] < $b['order']) ? -1 : 1;
        } else {
            return $this->_orderAlpha($a['displayname'], $b['displayname']);
        }
    }

    public function _comparePlayer($a, $b)
    {
        // Determine userlevel (0 = Not server admin, 1 = Server admin)
        $userlevela = $a['userstatus'] & 1;
        $userlevelb = $b['userstatus'] & 1;
        if ($userlevela != $userlevelb) {
            return ($userlevela < $userlevelb) ? 1 : -1;
        } else {
            return $this->_orderAlpha($a['displayname'], $b['displayname']);
        }
    }

    public function sortServerInfo(&$serverInfo): void
    {
        usort($serverInfo['channellist'], [$this, '_compareChannel']);
        usort($serverInfo['playerlist'], [$this, '_comparePlayer']);
    }

    public function _formatTime($totaltime)
    {
        $hours   = floor($totaltime / 3600);
        $minutes = floor(($totaltime % 3600) / 60);

        return (($hours < 10) ? '0' : '').$hours.':'.(($minutes < 10) ? '0' : '').$minutes;
    }

    // Returns the codec name
    public function _getCodecName($codec)
    {
        if (0 == $codec) {
            return 'CELP 5.1 Kbit';
        } elseif (1 == $codec) {
            return 'CELP 6.3 Kbit';
        } elseif (2 == $codec) {
            return 'GSM 14.8 Kbit';
        } elseif (3 == $codec) {
            return 'GSM 16.4 Kbit';
        } elseif (4 == $codec) {
            return 'CELP Windows 5.2 Kbit';
        } elseif (5 == $codec) {
            return 'Speex 3.4 Kbit';
        } elseif (6 == $codec) {
            return 'Speex 5.2 Kbit';
        } elseif (7 == $codec) {
            return 'Speex 7.2 Kbit';
        } elseif (8 == $codec) {
            return 'Speex 9.3 Kbit';
        } elseif (9 == $codec) {
            return 'Speex 12.3 Kbit';
        } elseif (10 == $codec) {
            return 'Speex 16.3 Kbit';
        } elseif (11 == $codec) {
            return 'Speex 19.5 Kbit';
        } elseif (12 == $codec) {
            return 'Speex 25.9 Kbit';
        } else {
            return 'Unknown ('.$codec.')';
        }
    }

    public function getDefaultSettings()
    {
        $result                           = [];
        $result['serveraddress']          = '';
        $result['serverudpport']          = 8767;
        $result['serverqueryport']        = 51234;
        $result['limitchannel']           = '';
        $result['forbiddennicknamechars'] = '()[]{}';

        return $result;
    }

    // Main function (queries, sorts and displays the teamspeak serverinfo). Its code is not
    // very readable... well what shall I say about it... it was hard to write so it should
    // be hard to read >:)
    public function displayTeamspeakEx($settings): void
    {
        $serverInfo = $this->queryTeamspeakServerEx($settings);

        echo "<div id=\"teamspeakdisplay\">\n";
        if (0 != $serverInfo['queryerror']) {
            $popupInfo = 'Server address: '.$settings['serveraddress'].((8767 != $settings['serverudpport']) ? (':'.$settings['serverudpport']) : '');
            if (1 == $serverInfo['queryerror']) {
                $popupInfo .= ', Error: could not connect to query port';
            } else {
                $popupInfo .= ', Error: no server running on port '.$settings['serverudpport'];
            }
            echo '<table><tr><td>';
            echo '<img src="teamspeakdisplay/teamspeak_offline.png" alt="" title="'.$popupInfo.'">';
            echo '</td><td class="teamspeakserver" title="'.$popupInfo.'">';
            echo 'Server offline';
            echo "</td></tr></table>\n";
        } else {
            $this->sortServerInfo($serverInfo);

            // Generate javascript for teamspeak hyperlinks
            $jsTeamspeakId = md5($settings['serveraddress'].':'.$settings['serverudpport']);
            echo "<script type=\"text/javascript\"><!--\n";
            echo 'function stringOk_'.$jsTeamspeakId."(string, forbiddenChars) {\n";
            echo "	for(var i = 0; i < string.length; i++) {\n";
            echo "		if (forbiddenChars.indexOf(string.charAt(i)) > -1) {\n";
            echo "			return false;\n";
            echo "		}\n";
            echo "	}\n";
            echo "	return true;\n";
            echo "}\n";
            echo 'function enterServer_'.$jsTeamspeakId."() {\n";
            echo '	enterSubChannel_'.$jsTeamspeakId."(null, false, null);\n";
            echo "}\n";
            echo 'function enterChannel_'.$jsTeamspeakId."(channelName, channelPassworded) {\n";
            echo '	enterSubChannel_'.$jsTeamspeakId."(channelName, channelPassworded, null);\n";
            echo "}\n";
            echo 'function enterSubChannel_'.$jsTeamspeakId."(channelName, channelPassworded, subChannelName) {\n";
            echo "	var serveraddress = 'teamspeak://".$settings['serveraddress'].':'.$settings['serverudpport']."';\n";
            echo "	var nickname=window.prompt('Enter your nickname', '');\n";
            echo "	if (nickname == null) {\n";
            echo "		return;\n";
            echo '	} else if (! stringOk_'.$jsTeamspeakId."(nickname, '".str_replace("'", "\\'", $settings['forbiddennicknamechars'])."')) {\n";
            echo "		window.alert('Could not enter the teamspeak server because the nickname you entered contains one or more of these forbidden characters: ".str_replace("'", "\\'", $settings['forbiddennicknamechars'])."');\n";
            echo "		return;\n";
            echo "	} else if (nickname == \"\") {\n";
            echo "		window.alert('Could not enter the teamspeak server because you did not enter your nickname');\n";
            echo "		return;\n";
            echo "	}\n";
            echo "	serveraddress = serveraddress + \"/nickname=\" + escape(nickname);\n";
            if ('1' == $serverInfo['serverinfo']['server_password']) {
                echo "	var password=window.prompt('Enter the teamspeak server password for ".$serverInfo['serverinfo']['server_name']."', '');\n";
                echo "	if (password == null) {\n";
                echo "		return;\n";
                echo "	} else if (password == \"\") {\n";
                echo "		window.alert('Could not enter the teamspeak server because you did not enter a server password');\n";
                echo "		return;\n";
                echo "	}\n";
                echo "	serveraddress = serveraddress + \"?password=\" + escape(password);\n";
            }
            echo "	if (channelName != null) { serveraddress = serveraddress + \"?channel=\" + escape(channelName); }\n";
            echo "	if (channelPassworded) {\n";
            echo "		var channelpassword=window.prompt('Enter the channel password for channel ' + channelName, '');\n";
            echo "		if (channelpassword == null) {\n";
            echo "			return;\n";
            echo "		} else if (channelpassword == \"\") {\n";
            echo "			window.alert('Could not enter the teamspeak server because you did not enter a channel password');\n";
            echo "			return;\n";
            echo "		}\n";
            echo "		serveraddress = serveraddress + \"?channelpassword=\" + escape(channelpassword);\n";
            echo "	}\n";
            echo "	if (subChannelName != null) { serveraddress = serveraddress + \"?subchannel=\" + escape(subChannelName); }\n";
            echo "	window.location=serveraddress;\n";
            echo "}\n";
            echo "//--></script>\n";

            $popupInfo = 'Server address: '.$settings['serveraddress'].((8767 != $settings['serverudpport']) ? (':'.$settings['serverudpport']) : '').', Max players: '.$serverInfo['serverinfo']['server_maxusers'].', Uptime: '.$this->_formatTime($serverInfo['serverinfo']['server_uptime']);

            // Print the topmost element of the teamspeak tree
            echo '<table><tr><td>';
            echo '<img src="teamspeakdisplay/teamspeak_online.png" alt="" title="'.$popupInfo.'">';
            echo '</td><td class="teamspeakserver" title="'.$popupInfo.'">';
            echo '<a class="teamspeakserver" href="javascript:enterServer_'.$jsTeamspeakId.'();">';
            echo str_replace(' ', '&nbsp;', htmlspecialchars($serverInfo['serverinfo']['server_name']));
            echo '</a>';
            echo "</td></tr></table>\n";

            // Count the number of channels to be listed:
            $currentchannels = 0;
            foreach ($serverInfo['channellist'] as $channelInfo) {
                if (-1 == $channelInfo['parent']) {
                    ++$currentchannels;
                }
            }

            // Initialize the channelcounter to zero
            $counter = 0;

            // Loop through all channels:
            foreach ($serverInfo['channellist'] as $channelInfo) {
                if (-1 == $channelInfo['parent']) {
                    // determine number of players in channel
                    $currentplayers = 0;
                    foreach ($serverInfo['playerlist'] as $playerInfo) {
                        if ($playerInfo['channelid'] == $channelInfo['channelid']) {
                            ++$currentplayers;
                        }
                    }

                    // Count the number of channels to be listed:
                    $currentplayersandsubchannels = $currentplayers;
                    foreach ($serverInfo['channellist'] as $subchannelInfo) {
                        if ($subchannelInfo['parent'] == $channelInfo['channelid']) {
                            ++$currentplayersandsubchannels;
                        }
                    }

                    $popupInfo = 'Max players: '.$channelInfo['maxplayers'].', Codec: '.$this->_getCodecName($channelInfo['codec']);
                    if ('' != $channelInfo['topic']) {
                        $popupInfo = $popupInfo.', Topic: '.$channelInfo['topic'];
                    }

                    // Display channel:
                    echo '<table><tr><td>';
                    echo '<img src="teamspeakdisplay/treeimage'.((($counter + 1) == $currentchannels) ? '3' : '2').'.png" alt="">';
                    echo '<img src="teamspeakdisplay/channel.png" alt="" title="'.$popupInfo.'">';
                    echo '</td><td class="teamspeakchannel" title="'.$popupInfo.'">';
                    echo '<a class="teamspeakchannel" href="javascript:enterChannel_'.$jsTeamspeakId."('".str_replace("'", "\'", $channelInfo['channelname'])."', ".('1' == $channelInfo['password'] ? 'true' : 'false').');">';
                    echo str_replace(' ', '&nbsp;', htmlspecialchars($channelInfo['displayname']));
                    echo '</a>';
                    echo "</td></tr></table>\n";

                    // Initialize the playercounter for this channel to zero
                    $counter_playerandsubchannels = 0;

                    // Loop through all players in the current channel:
                    foreach ($serverInfo['playerlist'] as $playerInfo) {
                        // Is the current player in the current channel?
                        if ($playerInfo['channelid'] == $channelInfo['channelid']) {
                            $popupInfo = 'Time online: '.$this->_formatTime($playerInfo['totaltime']).', Time idle: '.$this->_formatTime($playerInfo['idletime']).', Ping: '.$playerInfo['pingtime'].'ms';

                            // Display player:
                            echo '<table><tr><td>';
                            echo '<img src="teamspeakdisplay/treeimage'.((($counter + 1) == $currentchannels) ? '4' : '1').'.png" alt="">';
                            echo '<img src="teamspeakdisplay/treeimage'.((($counter_playerandsubchannels + 1) == $currentplayersandsubchannels) ? '3' : '2').'.png" alt="">';
                            echo '<img src="teamspeakdisplay/player_'.$playerInfo['displayimage'].'.png" alt="'.$playerInfo['displayimage'].'" title="'.$popupInfo.'">';
                            echo '</td><td class="teamspeakplayer" title="'.$popupInfo.'">';
                            echo str_replace(' ', '&nbsp;', htmlspecialchars($playerInfo['displayname']));
                            echo "</td></tr></table>\n";

                            // Increase the player counter:
                            ++$counter_playerandsubchannels;
                        }
                    }

                    // Loop through all channels:
                    foreach ($serverInfo['channellist'] as $subchannelInfo) {
                        if ($subchannelInfo['parent'] == $channelInfo['channelid']) {
                            // determine number of players in channel
                            $currentplayers = 0;
                            foreach ($serverInfo['playerlist'] as $playerInfo) {
                                if ($playerInfo['channelid'] == $subchannelInfo['channelid']) {
                                    ++$currentplayers;
                                }
                            }

                            $popupInfo = 'Max players: '.$subchannelInfo['maxplayers'].', Codec: '.$this->_getCodecName($subchannelInfo['codec']);
                            if ('' != $subchannelInfo['topic']) {
                                $popupInfo = $popupInfo.', Topic: '.$subchannelInfo['topic'];
                            }

                            // Display channel:
                            echo '<table><tr><td>';
                            echo '<img src="teamspeakdisplay/treeimage'.((($counter + 1) == $currentchannels) ? '4' : '1').'.png" alt="">';
                            echo '<img src="teamspeakdisplay/treeimage'.((($counter_playerandsubchannels + 1) == $currentplayersandsubchannels) ? '3' : '2').'.png" alt="">';
                            echo '<img src="teamspeakdisplay/channel.png" alt="" title="'.$popupInfo.'">';
                            echo '</td><td class="teamspeaksubchannel" title="'.$popupInfo.'">';
                            echo '<a class="teamspeaksubchannel" href="javascript:enterSubChannel_'.$jsTeamspeakId."('".str_replace("'", "\'", $channelInfo['channelname'])."', ".('1' == $channelInfo['password'] ? 'true' : 'false').", '".str_replace("'", "\'", $subchannelInfo['channelname'])."');\">";
                            echo str_replace(' ', '&nbsp;', htmlspecialchars($subchannelInfo['displayname']));
                            echo '</a>';
                            echo "</td></tr></table>\n";

                            // Initialize the playercounter for this channel to zero
                            $counter_player = 0;

                            // Loop through all players in the current channel:
                            foreach ($serverInfo['playerlist'] as $playerInfo) {
                                // Is the current player in the current channel?
                                if ($playerInfo['channelid'] == $subchannelInfo['channelid']) {
                                    $popupInfo = 'Time online: '.$this->_formatTime($playerInfo['totaltime']).', Time idle: '.$this->_formatTime($playerInfo['idletime']).', Ping: '.$playerInfo['pingtime'].'ms';

                                    // Display player:
                                    echo '<table><tr><td>';
                                    echo '<img src="teamspeakdisplay/treeimage'.((($counter + 1) == $currentchannels) ? '4' : '1').'.png" alt="">';
                                    echo '<img src="teamspeakdisplay/treeimage'.((($counter_playerandsubchannels + 1) == $currentplayersandsubchannels) ? '4' : '1').'.png" alt="">';
                                    echo '<img src="teamspeakdisplay/treeimage'.((($counter_player + 1) == $currentplayers) ? '3' : '2').'.png" alt="">';
                                    echo '<img src="teamspeakdisplay/player_'.$playerInfo['displayimage'].'.png" alt="'.$playerInfo['displayimage'].'" title="'.$popupInfo.'">';
                                    echo '</td><td class="teamspeakplayer" title="'.$popupInfo.'">';
                                    echo str_replace(' ', '&nbsp;', htmlspecialchars($playerInfo['displayname']));
                                    echo "</td></tr></table>\n";

                                    // Increase the player counter:
                                    ++$counter_player;
                                }
                            }

                            // Increase the channelcounter
                            ++$counter_playerandsubchannels;
                        }
                    }

                    // Increase the channelcounter
                    ++$counter;
                }
            }
        }
        echo "</div>\n";
    }

    public function displayTeamspeak($serverAddress, $serverUDPPort = 8767, $serverQueryPort = 51234): void
    {
        $settings                    = $this->getDefaultSettings();
        $settings['serveraddress']   = $serverAddress;
        $settings['serverudpport']   = $serverUDPPort;
        $settings['serverqueryport'] = $serverQueryPort;
        $this->displayTeamspeakEx($settings);
    }
}

// Create an instance of the Teamspeak Display Class
$teamspeakDisplay = new teamspeakDisplayClass();
