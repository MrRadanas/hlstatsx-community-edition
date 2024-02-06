<?php

/*
    This file should not be modified. This is so that future versions can be
    dropped into place as servers are updated.

    Version 2.3.0: Supports phantoms.
    Version 2.2.1: Supports channel comments.
*/

function StrKey($src, $key, &$res)
{
    $key .= ' ';
    if (strncasecmp($src, $key, strlen($key))) {
        return false;
    }

    $res = substr($src, strlen($key));

    return true;
}

function StrSplit($src, $sep, &$d1, &$d2)
{
    $pos = strpos($src, (string) $sep);
    if (false === $pos) {
        $d1 = $src;

        return;
    }

    $d1 = substr($src, 0, $pos);
    $d2 = substr($src, $pos + 1);
}

function StrDecode(&$src)
{
    $res = '';

    for ($i = 0; $i < strlen($src);) {
        if ('%' == $src[$i]) {
            $res .= sprintf('%c', intval(substr($src, $i + 1, 2), 16));
            $i += 3;
            continue;
        }

        $res .= $src[$i];
        ++$i;
    }

    return $res;
}

class CVentriloClient
{
    public $m_uid;			// User ID.
    public $m_admin;		// Admin flag.
    public $m_phan;		// Phantom flag.
    public $m_cid;			// Channel ID.
    public $m_ping;		// Ping.
    public $m_sec;			// Connect time in seconds.
    public $m_name;		// Login name.
    public $m_comm;		// Comment.

    public function Parse($str): void
    {
        $ary = explode(',', $str);

        for ($i = 0; $i < count($ary); ++$i) {
            StrSplit($ary[$i], '=', $field, $val);

            if (0 == strcasecmp($field, 'UID')) {
                $this->m_uid = $val;
                continue;
            }

            if (0 == strcasecmp($field, 'ADMIN')) {
                $this->m_admin = $val;
                continue;
            }

            if (0 == strcasecmp($field, 'CID')) {
                $this->m_cid = $val;
                continue;
            }

            if (0 == strcasecmp($field, 'PHAN')) {
                $this->m_phan = $val;
                continue;
            }

            if (0 == strcasecmp($field, 'PING')) {
                $this->m_ping = $val;
                continue;
            }

            if (0 == strcasecmp($field, 'SEC')) {
                $this->m_sec = $val;
                continue;
            }

            if (0 == strcasecmp($field, 'NAME')) {
                $this->m_name = StrDecode($val);
                continue;
            }

            if (0 == strcasecmp($field, 'COMM')) {
                $this->m_comm = StrDecode($val);
                continue;
            }
        }
    }
}

class CVentriloChannel
{
    public $m_cid;		// Channel ID.
    public $m_pid;		// Parent channel ID.
    public $m_prot;	// Password protected flag.
    public $m_auth;	// Authorication protected flag.
    public $m_name;	// Channel name.
    public $m_comm;	// Channel comment.

    public function Parse($str): void
    {
        $ary = explode(',', $str);

        for ($i = 0; $i < count($ary); ++$i) {
            StrSplit($ary[$i], '=', $field, $val);

            if (0 == strcasecmp($field, 'CID')) {
                $this->m_cid = $val;
                continue;
            }

            if (0 == strcasecmp($field, 'PID')) {
                $this->m_pid = $val;
                continue;
            }

            if (0 == strcasecmp($field, 'PROT')) {
                $this->m_prot = $val;
                continue;
            }

            if (0 == strcasecmp($field, 'NAME')) {
                $this->m_name = StrDecode($val);
                continue;
            }

            if (0 == strcasecmp($field, 'COMM')) {
                $this->m_comm = StrDecode($val);
                continue;
            }
        }
    }
}

class CVentriloStatus
{
    // These need to be filled in before issueing the request.

    public $m_cmdcode;		// Specific status request code. 1=General, 2=Detail.
    public $m_cmdhost;		// Hostname or IP address to perform status of.
    public $m_cmdport;		// Port number of server to status.

    // These are the result variables that are filled in when the request is performed.

    public $m_error;		// If the ERROR: keyword is found then this is the reason following it.

    public $m_name;				// Server name.
    public $m_phonetic;			// Phonetic spelling of server name.
    public $m_comment;				// Server comment.
    public $m_maxclients;			// Maximum number of clients.
    public $m_voicecodec_code;		// Voice codec code.
    public $m_voicecodec_desc;		// Voice codec description.
    public $m_voiceformat_code;	// Voice format code.
    public $m_voiceformat_desc;	// Voice format description.
    public $m_uptime;				// Server uptime in seconds.
    public $m_platform;			// Platform description.
    public $m_version;				// Version string.

    public $m_channelcount;		// Number of channels as specified by the server.
    public $m_channelfields;		// Channel field names.
    public $m_channellist;			// Array of CVentriloChannel's.

    public $m_clientcount;			// Number of clients as specified by the server.
    public $m_clientfields;		// Client field names.
    public $m_clientlist;			// Array of CVentriloClient's.

    public function Parse($str)
    {
        // Remove trailing newline.

        $pos = strpos($str, "\n");
        if (false === $pos) {
        } else {
            $str = substr($str, 0, $pos);
        }

        // Begin parsing for keywords.

        if (StrKey($str, 'ERROR:', $val)) {
            $this->m_error = $val;

            return -1;
        }

        if (StrKey($str, 'NAME:', $val)) {
            $this->m_name = StrDecode($val);

            return 0;
        }

        if (StrKey($str, 'PHONETIC:', $val)) {
            $this->m_phonetic = StrDecode($val);

            return 0;
        }

        if (StrKey($str, 'COMMENT:', $val)) {
            $this->m_comment = StrDecode($val);

            return 0;
        }

        if (StrKey($str, 'AUTH:', $this->m_auth)) {
            return 0;
        }

        if (StrKey($str, 'MAXCLIENTS:', $this->m_maxclients)) {
            return 0;
        }

        if (StrKey($str, 'VOICECODEC:', $val)) {
            StrSplit($val, ',', $this->m_voicecodec_code, $desc);
            $this->m_voicecodec_desc = StrDecode($desc);

            return 0;
        }

        if (StrKey($str, 'VOICEFORMAT:', $val)) {
            StrSplit($val, ',', $this->m_voiceformat_code, $desc);
            $this->m_voiceformat_desc = StrDecode($desc);

            return 0;
        }

        if (StrKey($str, 'UPTIME:', $val)) {
            $this->m_uptime = $val;

            return 0;
        }

        if (StrKey($str, 'PLATFORM:', $val)) {
            $this->m_platform = StrDecode($val);

            return 0;
        }

        if (StrKey($str, 'VERSION:', $val)) {
            $this->m_version = StrDecode($val);

            return 0;
        }

        if (StrKey($str, 'CHANNELCOUNT:', $this->m_channelcount)) {
            return 0;
        }

        if (StrKey($str, 'CHANNELFIELDS:', $this->m_channelfields)) {
            return 0;
        }

        if (StrKey($str, 'CHANNEL:', $val)) {
            $chan = new CVentriloChannel();
            $chan->Parse($val);

            $this->m_channellist[count($this->m_channellist)] = $chan;

            return 0;
        }

        if (StrKey($str, 'CLIENTCOUNT:', $this->m_clientcount)) {
            return 0;
        }

        if (StrKey($str, 'CLIENTFIELDS:', $this->m_clientfields)) {
            return 0;
        }

        if (StrKey($str, 'CLIENT:', $val)) {
            $client = new CVentriloClient();
            $client->Parse($val);

            $this->m_clientlist[count($this->m_clientlist)] = $client;

            return 0;
        }

        // Unknown key word. Could be a new keyword from a newer server.

        return 1;
    }

    public function ChannelFind($cid)
    {
        for ($i = 0; $i < count($this->m_channellist); ++$i) {
            if ($this->m_channellist[$i]->m_cid == $cid) {
                return $this->m_channellist[$i];
            }
        }

        return null;
    }

    public function ChannelPathName($idx)
    {
        $chan     = $this->m_channellist[$idx];
        $pathname = $chan->m_name;

        while (true) {
            $chan = $this->ChannelFind($chan->m_pid);
            if (null == $chan) {
                break;
            }

            $pathname = $chan->m_name.'/'.$pathname;
        }

        return $pathname;
    }

    public function Request()
    {
        $ventserv = new Vent();
        $ventserv->setTimeout(100000);		// 100 ms timeout
        if ($ventserv->makeRequest($this->m_cmdcode, $this->m_cmdhost, $this->m_cmdport)) {
            $res = explode("[\n\r\t]+", $ventserv->getResponse());
        }

        foreach ($res as $line) {
            $this->Parse($line);
        }

        return 0;
    }
}

/* vent.inc.php: structures, helper functions and classes related to ventrilo queries.
 *	written for PHP4. You'll need to make a few changes for PHP5.
 *	Based on a C program written by Luigi Auriemma.

LICENSE
=======
    Copyright (C) 2005 C. Mark Veaudry
    Copyright 2005 Luigi Auriemma

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA

    http://www.gnu.org/licenses/gpl.txt

=======

    If you modify or create derivative works based on this code, please respect
    our work and carry along our Copyright notices along with the GNU GPL.
    The GPL DOES NOT allow you to release modified or derivative works under
    any other license. Before you modify this code, read up on your rights
    and obligations under the GPL.
 */

define('VENT_HEADSIZE', 20);
define('VENT_MAXPACKETSIZE', 512);
define('VENT_MAXPACKETNO', 32);

function &getHeadEncodeRef()
{
    static $ventrilo_udp_encdata_head = [
        0x80, 0xE5, 0x0E, 0x38, 0xBA, 0x63, 0x4C, 0x99, 0x88, 0x63, 0x4C, 0xD6, 0x54, 0xB8, 0x65, 0x7E,
        0xBF, 0x8A, 0xF0, 0x17, 0x8A, 0xAA, 0x4D, 0x0F, 0xB7, 0x23, 0x27, 0xF6, 0xEB, 0x12, 0xF8, 0xEA,
        0x17, 0xB7, 0xCF, 0x52, 0x57, 0xCB, 0x51, 0xCF, 0x1B, 0x14, 0xFD, 0x6F, 0x84, 0x38, 0xB5, 0x24,
        0x11, 0xCF, 0x7A, 0x75, 0x7A, 0xBB, 0x78, 0x74, 0xDC, 0xBC, 0x42, 0xF0, 0x17, 0x3F, 0x5E, 0xEB,
        0x74, 0x77, 0x04, 0x4E, 0x8C, 0xAF, 0x23, 0xDC, 0x65, 0xDF, 0xA5, 0x65, 0xDD, 0x7D, 0xF4, 0x3C,
        0x4C, 0x95, 0xBD, 0xEB, 0x65, 0x1C, 0xF4, 0x24, 0x5D, 0x82, 0x18, 0xFB, 0x50, 0x86, 0xB8, 0x53,
        0xE0, 0x4E, 0x36, 0x96, 0x1F, 0xB7, 0xCB, 0xAA, 0xAF, 0xEA, 0xCB, 0x20, 0x27, 0x30, 0x2A, 0xAE,
        0xB9, 0x07, 0x40, 0xDF, 0x12, 0x75, 0xC9, 0x09, 0x82, 0x9C, 0x30, 0x80, 0x5D, 0x8F, 0x0D, 0x09,
        0xA1, 0x64, 0xEC, 0x91, 0xD8, 0x8A, 0x50, 0x1F, 0x40, 0x5D, 0xF7, 0x08, 0x2A, 0xF8, 0x60, 0x62,
        0xA0, 0x4A, 0x8B, 0xBA, 0x4A, 0x6D, 0x00, 0x0A, 0x93, 0x32, 0x12, 0xE5, 0x07, 0x01, 0x65, 0xF5,
        0xFF, 0xE0, 0xAE, 0xA7, 0x81, 0xD1, 0xBA, 0x25, 0x62, 0x61, 0xB2, 0x85, 0xAD, 0x7E, 0x9D, 0x3F,
        0x49, 0x89, 0x26, 0xE5, 0xD5, 0xAC, 0x9F, 0x0E, 0xD7, 0x6E, 0x47, 0x94, 0x16, 0x84, 0xC8, 0xFF,
        0x44, 0xEA, 0x04, 0x40, 0xE0, 0x33, 0x11, 0xA3, 0x5B, 0x1E, 0x82, 0xFF, 0x7A, 0x69, 0xE9, 0x2F,
        0xFB, 0xEA, 0x9A, 0xC6, 0x7B, 0xDB, 0xB1, 0xFF, 0x97, 0x76, 0x56, 0xF3, 0x52, 0xC2, 0x3F, 0x0F,
        0xB6, 0xAC, 0x77, 0xC4, 0xBF, 0x59, 0x5E, 0x80, 0x74, 0xBB, 0xF2, 0xDE, 0x57, 0x62, 0x4C, 0x1A,
        0xFF, 0x95, 0x6D, 0xC7, 0x04, 0xA2, 0x3B, 0xC4, 0x1B, 0x72, 0xC7, 0x6C, 0x82, 0x60, 0xD1, 0x0D,
    ];

    return $ventrilo_udp_encdata_head;
}

function &getDataEncodeRef()
{
    static $ventrilo_udp_encdata_data = [
        0x82, 0x8B, 0x7F, 0x68, 0x90, 0xE0, 0x44, 0x09, 0x19, 0x3B, 0x8E, 0x5F, 0xC2, 0x82, 0x38, 0x23,
        0x6D, 0xDB, 0x62, 0x49, 0x52, 0x6E, 0x21, 0xDF, 0x51, 0x6C, 0x76, 0x37, 0x86, 0x50, 0x7D, 0x48,
        0x1F, 0x65, 0xE7, 0x52, 0x6A, 0x88, 0xAA, 0xC1, 0x32, 0x2F, 0xF7, 0x54, 0x4C, 0xAA, 0x6D, 0x7E,
        0x6D, 0xA9, 0x8C, 0x0D, 0x3F, 0xFF, 0x6C, 0x09, 0xB3, 0xA5, 0xAF, 0xDF, 0x98, 0x02, 0xB4, 0xBE,
        0x6D, 0x69, 0x0D, 0x42, 0x73, 0xE4, 0x34, 0x50, 0x07, 0x30, 0x79, 0x41, 0x2F, 0x08, 0x3F, 0x42,
        0x73, 0xA7, 0x68, 0xFA, 0xEE, 0x88, 0x0E, 0x6E, 0xA4, 0x70, 0x74, 0x22, 0x16, 0xAE, 0x3C, 0x81,
        0x14, 0xA1, 0xDA, 0x7F, 0xD3, 0x7C, 0x48, 0x7D, 0x3F, 0x46, 0xFB, 0x6D, 0x92, 0x25, 0x17, 0x36,
        0x26, 0xDB, 0xDF, 0x5A, 0x87, 0x91, 0x6F, 0xD6, 0xCD, 0xD4, 0xAD, 0x4A, 0x29, 0xDD, 0x7D, 0x59,
        0xBD, 0x15, 0x34, 0x53, 0xB1, 0xD8, 0x50, 0x11, 0x83, 0x79, 0x66, 0x21, 0x9E, 0x87, 0x5B, 0x24,
        0x2F, 0x4F, 0xD7, 0x73, 0x34, 0xA2, 0xF7, 0x09, 0xD5, 0xD9, 0x42, 0x9D, 0xF8, 0x15, 0xDF, 0x0E,
        0x10, 0xCC, 0x05, 0x04, 0x35, 0x81, 0xB2, 0xD5, 0x7A, 0xD2, 0xA0, 0xA5, 0x7B, 0xB8, 0x75, 0xD2,
        0x35, 0x0B, 0x39, 0x8F, 0x1B, 0x44, 0x0E, 0xCE, 0x66, 0x87, 0x1B, 0x64, 0xAC, 0xE1, 0xCA, 0x67,
        0xB4, 0xCE, 0x33, 0xDB, 0x89, 0xFE, 0xD8, 0x8E, 0xCD, 0x58, 0x92, 0x41, 0x50, 0x40, 0xCB, 0x08,
        0xE1, 0x15, 0xEE, 0xF4, 0x64, 0xFE, 0x1C, 0xEE, 0x25, 0xE7, 0x21, 0xE6, 0x6C, 0xC6, 0xA6, 0x2E,
        0x52, 0x23, 0xA7, 0x20, 0xD2, 0xD7, 0x28, 0x07, 0x23, 0x14, 0x24, 0x3D, 0x45, 0xA5, 0xC7, 0x90,
        0xDB, 0x77, 0xDD, 0xEA, 0x38, 0x59, 0x89, 0x32, 0xBC, 0x00, 0x3A, 0x6D, 0x61, 0x4E, 0xDB, 0x29,
    ];

    return $ventrilo_udp_encdata_data;
}

function &getCRCref()
{
    static $ventrilo_crc_table = [
        0x0000, 0x1021, 0x2042, 0x3063, 0x4084, 0x50A5, 0x60C6, 0x70E7,
        0x8108, 0x9129, 0xA14A, 0xB16B, 0xC18C, 0xD1AD, 0xE1CE, 0xF1EF,
        0x1231, 0x0210, 0x3273, 0x2252, 0x52B5, 0x4294, 0x72F7, 0x62D6,
        0x9339, 0x8318, 0xB37B, 0xA35A, 0xD3BD, 0xC39C, 0xF3FF, 0xE3DE,
        0x2462, 0x3443, 0x0420, 0x1401, 0x64E6, 0x74C7, 0x44A4, 0x5485,
        0xA56A, 0xB54B, 0x8528, 0x9509, 0xE5EE, 0xF5CF, 0xC5AC, 0xD58D,
        0x3653, 0x2672, 0x1611, 0x0630, 0x76D7, 0x66F6, 0x5695, 0x46B4,
        0xB75B, 0xA77A, 0x9719, 0x8738, 0xF7DF, 0xE7FE, 0xD79D, 0xC7BC,
        0x48C4, 0x58E5, 0x6886, 0x78A7, 0x0840, 0x1861, 0x2802, 0x3823,
        0xC9CC, 0xD9ED, 0xE98E, 0xF9AF, 0x8948, 0x9969, 0xA90A, 0xB92B,
        0x5AF5, 0x4AD4, 0x7AB7, 0x6A96, 0x1A71, 0x0A50, 0x3A33, 0x2A12,
        0xDBFD, 0xCBDC, 0xFBBF, 0xEB9E, 0x9B79, 0x8B58, 0xBB3B, 0xAB1A,
        0x6CA6, 0x7C87, 0x4CE4, 0x5CC5, 0x2C22, 0x3C03, 0x0C60, 0x1C41,
        0xEDAE, 0xFD8F, 0xCDEC, 0xDDCD, 0xAD2A, 0xBD0B, 0x8D68, 0x9D49,
        0x7E97, 0x6EB6, 0x5ED5, 0x4EF4, 0x3E13, 0x2E32, 0x1E51, 0x0E70,
        0xFF9F, 0xEFBE, 0xDFDD, 0xCFFC, 0xBF1B, 0xAF3A, 0x9F59, 0x8F78,
        0x9188, 0x81A9, 0xB1CA, 0xA1EB, 0xD10C, 0xC12D, 0xF14E, 0xE16F,
        0x1080, 0x00A1, 0x30C2, 0x20E3, 0x5004, 0x4025, 0x7046, 0x6067,
        0x83B9, 0x9398, 0xA3FB, 0xB3DA, 0xC33D, 0xD31C, 0xE37F, 0xF35E,
        0x02B1, 0x1290, 0x22F3, 0x32D2, 0x4235, 0x5214, 0x6277, 0x7256,
        0xB5EA, 0xA5CB, 0x95A8, 0x8589, 0xF56E, 0xE54F, 0xD52C, 0xC50D,
        0x34E2, 0x24C3, 0x14A0, 0x0481, 0x7466, 0x6447, 0x5424, 0x4405,
        0xA7DB, 0xB7FA, 0x8799, 0x97B8, 0xE75F, 0xF77E, 0xC71D, 0xD73C,
        0x26D3, 0x36F2, 0x0691, 0x16B0, 0x6657, 0x7676, 0x4615, 0x5634,
        0xD94C, 0xC96D, 0xF90E, 0xE92F, 0x99C8, 0x89E9, 0xB98A, 0xA9AB,
        0x5844, 0x4865, 0x7806, 0x6827, 0x18C0, 0x08E1, 0x3882, 0x28A3,
        0xCB7D, 0xDB5C, 0xEB3F, 0xFB1E, 0x8BF9, 0x9BD8, 0xABBB, 0xBB9A,
        0x4A75, 0x5A54, 0x6A37, 0x7A16, 0x0AF1, 0x1AD0, 0x2AB3, 0x3A92,
        0xFD2E, 0xED0F, 0xDD6C, 0xCD4D, 0xBDAA, 0xAD8B, 0x9DE8, 0x8DC9,
        0x7C26, 0x6C07, 0x5C64, 0x4C45, 0x3CA2, 0x2C83, 0x1CE0, 0x0CC1,
        0xEF1F, 0xFF3E, 0xCF5D, 0xDF7C, 0xAF9B, 0xBFBA, 0x8FD9, 0x9FF8,
        0x6E17, 0x7E36, 0x4E55, 0x5E74, 0x2E93, 0x3EB2, 0x0ED1, 0x1EF0,
    ];

    return $ventrilo_crc_table;
}

/* decbin2: PHP's decbin() doesn't pad the binary string to a full 32 bits, unless
 *	it's a negative number. Since we need to mimic casting to smaller int types,
 *	I'll use this version over the built-in decbin().
 */
function decbin2($val)
{
    return str_pad(decbin($val), 32, '0', STR_PAD_LEFT);
}

/* bindec2: PHP's decbin() stores negative numbers as two's complement... but PHP's
 *	bindec() doesn't check for two's! I'll use this to decode rather than the built-in function.
 *
 *	bindec( decbin( -1000 )) != -1000		// not correct!
 *	bindec2( decbin2( -1000 )) == -1000		// correct!
 */
function bindec2($binstr)
{
    $val = bindec($binstr);

    // it's not two's. Return the built-in bindec() value.
    if ((32 != strlen($binstr)) || ('0' == substr($binstr, 0, 1))) {
        return $val;
    }

    // it's two's. I needed the 0 shift to trick PHP into treating the var as an int.
    return ((~($val << 0)) + 1) * -1;
}

/* smallCast: mimic a cast from larger int to smaller int. $bits is the destination size.
 *	Internally, PHP integers seem to always be 32 bit. (my test systems are both 64-bit
 *	- Athlon x64 and PowerPC G5 - and PHP still uses 32 bit ints.)
 */
function smallCast($val, $bits)
{
    $binstr = decbin2($val);

    return bindec2(substr($binstr, 32 - $bits));
}

/* Vent: class to create all the data needed to encode and decode VentPackets.
 *	I'm using PHP4. If I were using PHP5, I'd use the 'private' keyword over
 *	var and use the accessor functions.
 */
class Vent
{
    public $clock;			// u_short of the epoch time for the last request.
    public $timeout;			// timeout for socket read in *microseconds* ( 1,000,000 microsec = 1 sec )
    public $packets = [];	// hold all the decoded response packets, in correct order
    public $response;			// all the decoded data

    public function getClock()
    {
        return $this->clock;
    }

    public function getTimeout()
    {
        return $this->timeout;
    }

    public function setTimeout($microsecs): void
    {
        $this->timeout = $microsecs;
    }

    public function &getPackets()
    {
        return $this->packets;
    } 		// by ref

    public function getResponse()
    {
        return $this->response;
    }

    /* makeRequest: send off a request to the vent server, return true/false. I'm not checking
    *	for valid IP or hostname - someone else can add this stuff.
    *	Note: The password field is no longer required for 2.3 or higher servers. Even if a server
    *	  is password protected, it will return status info.
    */
    public function makeRequest($cmd, $ip, $port, $pass = '')
    {
        $this->clock    = smallCast(time(), 16);		// reset the clock for each request
        $this->packets  = [];					// start fresh
        $this->response = '';

        $data = pack('a16', $pass);				// the only data for a request is a password, 16 bytes.

        $request = new VentRequestPacket($cmd, $this->clock, $pass);

        $sfh = fsockopen("udp://$ip", $port, $errno, $errstr);

        if (!$sfh) {
            echo "Socket Error: $errno - $errstr\n";

            return false;
        }

        fwrite($sfh, $request->packet);			// put the encoded request packet on the stream
        stream_set_timeout($sfh, 0, $this->timeout);

        /* read response packets off the stream. with UDP, packets can (and often)
        *   come out of order, so we'll put then back together after closing the socket.
        */
        while (false != $pck = fread($sfh, VENT_MAXPACKETSIZE)) {
            if (count($this->packets) >= VENT_MAXPACKETNO) {
                echo "ERROR: Received more packets than the maximum allowed in a response.\n";
                fclose($sfh);

                return false;
            }

            // decode this packet. If we get null back, there was an error in the decode.
            if (null == $rpobj = new VentResponsePacket($pck)) {
                fclose($sfh);

                return false;
            }

            /* check the id / clock. They should match the request, if not - skip it.
            * also skip if there's a duplicate packet. Could throw an error here.
            */
            if (($rpobj->id != $this->clock) || (isset($this->packets[$rpobj->pck]))) {
                continue;
            }

            $this->packets[$rpobj->pck] = $rpobj;
        }

        fclose($sfh);

        // check if we've got the right number of packets
        if ($this->packets[0]->totpck != count($this->packets)) {
            echo "ERROR: Received less packets than expected in the response.\n";

            return false;
        }

        // the order may not be correct. sort on the key.
        if (!ksort($this->packets, SORT_NUMERIC)) {
            echo "ERROR: Failed to sort the response packets in order.\n";

            return false;
        }

        /* All the response packets arrived, were decoded, and are in the proper order. We
        *   can pull the decoded data together, and check that the total length matches
        *   the value in the header, and the crc matches.
        */
        foreach ($this->packets as $packet) {
            $this->response .= $packet->rawdata;
        }

        $rlen = strlen($this->response);
        if ($rlen != $this->packets[0]->totlen) {
            echo "ERROR: Response data is $rlen bytes. Expected {$this->packets[0]->totlen} bytes.\n";

            return false;
        }

        $crc = (new Vent())->getCRC($this->response);

        if ($crc != $this->packets[0]->crc) {
            echo "ERROR: response crc is $crc. Expected: {$this->packets[0]->crc}.\n";

            return false;
        }

        return true;			// everything worked fine.
    }

    /* getCRC: find the CRC for a data argument.
    */
    public function getCRC(&$data)
    {
        $crc   = 0;
        $dtoks = unpack('c*', $data);		// Note: unpack starts output array index at 1, NOT 0.
        $table = getCRCref();			// my CRC table reference

        for ($i = 1; $i <= count($dtoks); ++$i) {
            $crc = $table[$crc >> 8] ^ $dtoks[$i] ^ smallCast($crc << 8, 16);
        }

        return $crc;
    }

    /* constructor: (need to change method name for PHP5)
     */
    public function __construct()
    {
        $this->timeout = 500000;		// default to 0.5 second timeout
    }
}
/* end of Vent class */

/* VentPacket: class to mimic the ventrilo_udp_head struct in the source,
 *	but with more logic moved inside.
 */
class VentPacket
{
    public $rawdata;		// hold raw, unencoded data portion of packet
    public $data;		// hold encoded data

    public $head_items;	// an array, with references to each item in the header, in proper order.
    public $header;		// encoded header string

    public $packet;		// hold full encoded packet (header + data)

    /* 10 vars for the packet header. all 2 byte unsigned shorts (20 byte header)
     * The order is important for packing / unpacking.
     */
    public $headkey;		// key used to encode the header part
    public $zero;			// always 0!
    public $cmd;			// 1, 2, or 7 are valid command requests
    public $id;			// epoch time cast into an unsigned short
    public $totlen;		// total data length, across all packets in this request / result
    public $len;			// data length in this packet
    public $totpck;		// total packets in this request / result
    public $pck;			// number of this packet
    public $datakey;		// key used to encode the data part
    public $crc;			// checksum

    /* mapHeader: Easy way to keep the correct order. We can use the array for loops when byte
     *	order is important, and still access each element by name. Using a straight hash would
     *	have lost the ordering.
     */
    public function mapHeader(): void
    {
        $this->head_items = [&$this->headkey, 	&$this->zero,	&$this->cmd,	&$this->id,
            &$this->totlen, 	&$this->len,	&$this->totpck,	&$this->pck,
            &$this->datakey,	&$this->crc];
    }
}
/* end of VentPacket class */

/* VentRequestPacket: For outgoing requests.
 */
class VentRequestPacket extends VentPacket
{
    /* createKeys: keys are used to encode header and data parts. a1 and a2 are the two cyphers
     *	derived from the full key.
     */
    public function createKeys(&$key, &$a1, &$a2, $is_head = false): void
    {
        $rndupk = unpack('vx', pack('S', mt_rand(1, 65536)));	// need this in little endian
        $rnd    = $rndupk['x'];

        $rnd &= 0x7FFF;

        $a1 = smallCast($rnd, 8);
        $a2 = $rnd >> 8;

        if (0 == $a2) {
            $a2 = ($is_head) ? 69 : 1;
            $rnd |= ($a2 << 8);
        }

        $key = $rnd;
    }

    /* encodeHeader: Encoded after the data portion. Do some sanity checks here,
     *		make sure all the header info is here, and we've got encoded data of
     *		the correct length...
     */
    public function encodeHeader(): void
    {
        $this->createKeys($key, $a1, $a2, true);
        $table = getHeadEncodeRef();

        $enchead = pack('n', $key);		// the head key doesn't get encoded, just packed.

        /* start the loop at 1 to skip headkey, pack them as unsigned shorts
         *   in network byte order. Append each one to our $to_encode string.
         */
        $to_encode = '';

        for ($i = 1; $i < count($this->head_items); ++$i) {
            $to_encode .= pack('n', $this->head_items[$i]);
        }

        /* Need to encode as unsigned chars, not shorts. That's the reason for the pack & unpack.
         *	Index starts at 1 for unpack return array, not 0.
         */
        $chars = unpack('C*', $to_encode);

        for ($i = 1; $i <= count($chars); ++$i) {
            $chars[$i] = smallCast($chars[$i] + $table[$a2] + (($i - 1) % 5), 8);
            $enchead .= pack('C', $chars[$i]);
            $a2 = smallCast($a2 + $a1, 8);
        }

        $this->headkey = $key;
        $this->header  = $enchead;
    }

    /* encodeData: The data has to be encoded first because the datakey is part of the
     *		header, and it needs to encoded along with the rest of the header.
     */
    public function encodeData(): void
    {
        $this->createKeys($key, $a1, $a2);

        $chars   = unpack('c*', $this->rawdata);		// 1 indexed array
        $table   = getDataEncodeRef();				// Data table reference
        $encdata = '';

        for ($i = 1; $i <= count($chars); ++$i) {
            $chars[$i] = smallCast($chars[$i] + $table[$a2] + (($i - 1) % 72), 8);
            $encdata .= pack('C', $chars[$i]);
            $a2 = smallCast($a2 + $a1, 8);
        }

        $this->datakey = $key;
        $this->data    = $encdata;
    }

    /* Constructor (Need to change to __Constructor() for PHP5?)
     */
    public function __construct($cmd, $id, $pass)
    {
        $this->mapHeader();							// set up the references
        $this->rawdata = pack('a16', $pass);			// the only thing in the data part.

        $this->zero   = 0;
        $this->cmd    = (1 == $cmd || 2 == $cmd || 7 == $cmd) ? $cmd : 1;
        $this->id     = $id;
        $this->totlen = strlen($this->rawdata);
        $this->len    = $this->totlen;
        $this->totpck = 1;
        $this->pck    = 0;
        $this->crc    = (new Vent())->getCRC($this->rawdata);
        $this->encodeData();						// $this->data & datakey set here.
        $this->encodeHeader();						// $this->header & headkey set here.

        $this->packet = $this->header.$this->data;
    }
}
/* end of VentRequestPacket class */

/* VentResponsePacket: For incoming data.
 */
class VentResponsePacket extends VentPacket
{
    /* decodeHeader: run through the header portion of the packet, get the key, decode,
     *	and perform some sanity checks.
     */
    public function decodeHeader()
    {
        $table = getHeadEncodeRef();

        $key_array = unpack('n1', $this->header);			// unpack the key as a short
        $chars     = unpack('C*', substr($this->header, 2));	// unpack the rest of the header as chars
        $key       = $key_array[1];

        $a1 = smallCast($key, 8);
        $a2 = $key >> 8;

        if (0 == $a1) {
            echo "ERROR: Invalid packet. Header key is invalid.\n";

            return false;
        }

        /* First step is to decode each unsigned char using the cypher key.
         *	Once we finish 2 bytes treat them as a short, get the endian right,
         *	and stick them in the proper header item slot.
         */
        $item_no = 1;		// for $this->head_items array. we skip the unencoded headkey, at index 0.

        for ($i = 1; $i <= count($chars); ++$i) {
            $chars[$i] -= smallCast($table[$a2] + (($i - 1) % 5), 8);
            $a2 = smallCast($a2 + $a1, 8);

            // Once we've completed two bytes, we can treat them as a short, and fix the endian.
            if (($i % 2) == 0) {
                $short_array                = unpack('n1', pack('C2', $chars[$i - 1], $chars[$i]));
                $this->head_items[$item_no] = $short_array[1];
                ++$item_no;
            }
        }

        // simple sanity checks
        if ((0 != $this->zero) || (3 != $this->cmd)) {
            echo "ERROR: Invalid packet. Expected 0 & 3, found {$this->zero} & {$this->cmd}.\n";

            return false;
        }

        if ($this->len != strlen($this->data)) {
            echo 'ERROR: Invalid packet. Data is '.strlen($this->data)." bytes, expected {$this->len}.\n";

            return false;
        }

        $this->headkey = $key;

        return true;
    }

    /* decodeData: use the datakey to find the cyphers and decode the data portion of the
        packet. Straightforward.
    */
    public function decodeData()
    {
        $table = getDataEncodeRef();

        $a1 = smallCast($this->datakey, 8);
        $a2 = $this->datakey >> 8;

        if (0 == $a1) {
            echo "ERROR: Invalid packet. Data key is invalid.\n";

            return false;
        }

        $chars = unpack('C*', $this->data);		// unpack the data as unsigned chars

        for ($i = 1; $i <= count($chars); ++$i) {
            $chars[$i] -= smallCast($table[$a2] + (($i - 1) % 72), 8);
            $a2 = smallCast($a2 + $a1, 8);
            $this->rawdata .= chr($chars[$i]);
        }

        return true;
    }

    /* constructor: change for PHP5.
    */
    public function __construct($packet)
    {
        $plen = strlen($packet);

        if (($plen > VENT_MAXPACKETSIZE) || ($plen < VENT_HEADSIZE)) {
            echo "ERROR: Response packet was $plen bytes. It should be between ";
            echo VENT_HEADSIZE.' and '.VENT_MAXPACKETSIZE." bytes.\n";

            return null;
        }

        $this->mapHeader();							// set up the references
        $this->packet = $packet;
        $this->header = substr($packet, 0, VENT_HEADSIZE);
        $this->data   = substr($packet, VENT_HEADSIZE);

        if (!$this->decodeHeader()) {
            return null;
        }
        if (!$this->decodeData()) {
            return null;
        }
    }
}
/* end of VentResponsePacket class */
