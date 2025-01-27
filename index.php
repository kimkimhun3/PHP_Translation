<?php require_once 'language.php'; ?>
<html lang="<?php echo $lang; ?>">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=0.5, maximum-scale=4,user-scalable=yes">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/diode.css">
<title>Data Diode SetUp</title>
</head>
<body>

  <header>
    <p><b><?php echo $translate["title"]["data_diode_setting"] ?></b></p>
    <form method="POST" id="languageForm">
        <select name="language" id="languageSelect" onchange="this.form.submit()" >
            <option value="ja">日本語</option>
            <option value="en">English</option>
        </select>
    </form>
  </header>

  <div id="content">

<div class="wrap-tab">
  <input id="tab-radio1" class="tab-radio" name="tab" type="radio" checked>
  <input id="tab-radio2" class="tab-radio" name="tab" type="radio">
  <input id="tab-radio3" class="tab-radio" name="tab" type="radio">
  <input id="tab-radio4" class="tab-radio" name="tab" type="radio">
  <input id="tab-radio5" class="tab-radio" name="tab" type="radio">
  <input id="tab-radio6" class="tab-radio" name="tab" type="radio">
  
  <ul class="list-tab-label">
    <li>
      <label id="tab-label1" class="tab-label" for="tab-radio1"><?php echo $translate["setting"]["basic_config"] ?></label>
    </li>
    <li>
      <label id="tab-label2" class="tab-label" for="tab-radio2">TCP</label>
    </li>
    <li>
      <label id="tab-label3" class="tab-label" for="tab-radio3">FTP</label>
    </li>
    <li>
      <label id="tab-label4" class="tab-label" for="tab-radio4">Syslog</label>
    </li>
    <li>
      <label id="tab-label5" class="tab-label" for="tab-radio5">SNMP-Trap</label>
    </li>
    <li>
      <label id="tab-label6" class="tab-label" for="tab-radio6"><?php echo $translate["setting"]["control"] ?></label>
    </li>
  </ul>
  
  <div class="wrap-tab-content">
  <form name="sys0" method="post" id="main" action="programs/procS.php">
    <div id="tab-content1" class="tab-content">
        <p><?php echo $translate["setting"]["basic_config"] ?></p>
        <section>
          <table border="0" cellspacing="3" cellpadding="2">
	    <tr><td colspan="2" bgcolor="#87cefa">SBC1 <?php echo $translate["setting"]["setting"] ?></td></tr>
            <tr><td>IPv4</td><td><input type="text" maxlength="15" value="<?php echo htmlspecialchars($data_sb1_ipadr[1],ENT_QUOTES); ?>" name="sbc1_ip" class="string" ></td></tr>
            <tr><td><?php echo $translate["setting"]["subnet_mask"] ?></td><td><input type="text"maxlength="15" value="<?php echo htmlspecialchars($data_sb1_mask[1],ENT_QUOTES); ?>" name="sbc1_sub" class="long_string" ></td></tr>
            <tr><td></td></tr>
	    <tr><td colspan="2" bgcolor="#87cefa">SBC2 <?php echo $translate["setting"]["setting"] ?></td></tr>
            <tr><td>IPv4</td><td><input type="text" maxlength="15" value="<?php echo htmlspecialchars($data_sb2_basic[0],ENT_QUOTES); ?>" name="sbc2_ip" class="string" /></td></tr>
            <tr><td><?php echo $translate["setting"]["subnet_mask"] ?></td><td><input type="text" maxlength="15" value="<?php echo htmlspecialchars($data_sb2_basic[1],ENT_QUOTES); ?>" name="sbc2_sub" class="string" /></td></tr>
            <tr><td><?php echo $translate["setting"]["default_gateway"] ?></td><td><input type="text" maxlength="15" value="<?php echo htmlspecialchars($data_sb2_basic[2],ENT_QUOTES); ?>" name="sbc2_gw" class="string" /></td></tr>
	    <tr><td></td></tr>
          </table>
        </section>
    </div>
    <div id="tab-content2" class="tab-content">
      <p>TCP</p>
      <section>
            <label>
            <input type="checkbox" name="tcp_enable" <?= $data_sb2_tcp[0]=="1" ? 'checked' : '' ?>  value="1"> TCP Enable
            </label>
          <table border="0" cellspacing="3" cellpadding="2">
	    <tr><td colspan="2" bgcolor="#87cefa">SBC2</td></tr>
            <tr><td><?php echo $translate["setting"]["destination"] ?> IP</td><td><input type="text" maxlength="15" value="<?php echo htmlspecialchars($data_sb2_tcp[1],ENT_QUOTES); ?>" name="sbc2_tcp_to_ip" class="string" /></td></tr>
            <tr><td><?php echo $translate["setting"]["destination"] ?> Port</td><td><input type="text" maxlength="5" value="<?php echo htmlspecialchars($data_sb2_tcp[2],ENT_QUOTES); ?>" name="sbc2_tcp_to_port" class="string" /></td></tr>
            <tr><td><?php echo $translate["setting"]["source"] ?> Port</td><td><input type="text" maxlength="5" value="<?php echo htmlspecialchars($data_sb2_tcp[3],ENT_QUOTES); ?>" name="sbc2_tcp_from_port" class="string" /></td></tr>
	    <tr><td colspan="2" bgcolor="#87cefa">SBC1</td></tr>
            <tr><td>eth2 TCP <?php echo $translate["setting"]["connection"] ?> Port</td><td><input type="text" maxlength="5" value="<?php echo htmlspecialchars($data_sb2_tcp[4],ENT_QUOTES); ?>" name="sbc1_tcp_to_port" class="string" /></td></tr>
          </table>
      </section>
    </div>

    <div id="tab-content3" class="tab-content">
      <p>FTP</p>
      <section>
            <label>
            <input type="checkbox" name="ftp_enable" <?= $data_sb2_ftp[0]=="1" ? 'checked' : '' ?> value="1"> FTP Enable
            </label>
          <table border="0" cellspacing="3" cellpadding="2">
	    <tr><td colspan="2" bgcolor="#87cefa">FTP <?php echo $translate["setting"]["server"] ?></td>
		<td width="20"></td>
		<td colspan="2" bgcolor="#87cefa"><?php echo $translate["setting"]["parameter"] ?></td>
            </tr>
            <tr>
            <td><?php echo $translate["setting"]["destination1"] ?> IP</td><td><input type="text" maxlength="15" value="<?php echo htmlspecialchars($data_sb2_ftp[1],ENT_QUOTES); ?>" name="sbc2_ftp_to_ip" class="string" /></td>
	    <td width="20"></td>
            <td>FTP <?php echo $translate["setting"]["transfer_interval"] ?></td>
            <td>
	    <select name="sbc2_ftp_delay_time">
		<option value="0" <?= $data_sb2_ftp[5]=="0" ? 'selected' : '' ?>>0.5ms</option>
		<option value="1" <?= $data_sb2_ftp[5]=="1" ? 'selected' : '' ?>>1ms</option>
		<option value="2" <?= $data_sb2_ftp[5]=="2" ? 'selected' : '' ?>>2ms</option>
		<option value="3" <?= $data_sb2_ftp[5]=="3" ? 'selected' : '' ?>>3ms</option>
	    </select>
            </td>
            </tr>
            <tr>
	    <td><?php echo $translate["setting"]["destination1"] ?> Port</td><td><input type="text" maxlength="5" value="<?php echo htmlspecialchars($data_sb2_ftp[2],ENT_QUOTES); ?>" name="sbc2_ftp_to_port" class="string" /></td>
	    <td width="20"></td>
            <td><?php echo $translate["setting"]["flow_control"] ?> PAUSE <?php echo $translate["footer"]["times"] ?></td>
            <td>
            <input type="text" maxlength="5" value="<?php echo htmlspecialchars($data_sb2_ftp[6],ENT_QUOTES); ?>" name="sbc2_ftp_flow_time" class="string" />
            </td>
            <td>1～65535</td>
            </tr>
            <tr><td>UserID</td><td><input type="text" maxlength="15" value="<?php echo htmlspecialchars($data_sb2_ftp[3],ENT_QUOTES); ?>" name="sbc2_ftp_to_user" class="string" /></td></tr>
            <tr><td>Password</td><td><input type="text" maxlength="15" value="<?php echo htmlspecialchars($data_sb2_ftp[4],ENT_QUOTES); ?>" name="sbc2_ftp_to_password" class="string" /></td></tr>
          </table>
      </section>
    </div>
    
    <div id="tab-content4" class="tab-content">
      <p>Syslog</p>
      <section>
            <label>
            <input type="checkbox" name="syslog_enable" <?= $data_syslog[0]=="1" ? 'checked' : '' ?> value="1"> Syslog Enable
            </label>
          <table border="0" cellspacing="3" cellpadding="2">
	    <tr><td colspan="2" bgcolor="#87cefa">SBC1</td></tr>
            <tr>
            <td>UDP Port <?php echo $translate["setting"]["receive_rang"] ?></td>
            <td><input type="text" maxlength="5" value="<?php echo htmlspecialchars($data_syslog[1],ENT_QUOTES); ?>" name="syslog_from_port" class="string" /></td>
       	    <td>～</td>
            <td><input type="text" maxlength="5" value="<?php echo htmlspecialchars($data_syslog[2],ENT_QUOTES); ?>" name="syslog_to_port" class="string" /></td>
            </tr>
	    <tr><td colspan="2" bgcolor="#87cefa">SBC2</td></tr>
            <tr><td><?php echo $translate["setting"]["server"] ?> IP</td><td><input type="text" maxlength="15" value="<?php echo htmlspecialchars($data_syslog[3],ENT_QUOTES); ?>" name="syslog_to_ip" class="string" /></td></tr>

          </table>
      </section>
    </div>
    
    <div id="tab-content5" class="tab-content">
      <p>SNMP-Trap</p>
      <section>
            <label>
            <input type="checkbox" name="snmp_enable" <?= $data_snmp[0]=="1" ? 'checked' : '' ?> value="1"> SNMP-Trap Enable
            </label>
          <table border="0" cellspacing="3" cellpadding="2">
	    <tr><td colspan="2" bgcolor="#87cefa">SBC1</td></tr>
            <tr>
            <td>UDP Port <?php echo $translate["setting"]["receive_rang"] ?></td>
            <td><input type="text" maxlength="5" value="<?php echo htmlspecialchars($data_snmp[1],ENT_QUOTES); ?>" name="snmp_from_port" class="string" /></td>
       	    <td>～</td>
            <td><input type="text" maxlength="5" value="<?php echo htmlspecialchars($data_snmp[2],ENT_QUOTES); ?>" name="snmp_to_port" class="string" /></td>
            </tr>
	    <tr><td colspan="2" bgcolor="#87cefa">SBC2</td></tr>
            <tr><td><?php echo $translate["setting"]["manager"] ?> IP</td><td><input type="text" maxlength="15" value="<?php echo htmlspecialchars($data_snmp[3],ENT_QUOTES); ?>" name="snmp_to_ip" class="string" /></td></tr>
          </table>
      </section>
    </div>

    <div id="tab-content6" class="tab-content">
        <p><?php echo $translate["setting"]["control"] ?></p>
        <section>
          <table border="0" cellspacing="3" cellpadding="2">
	    <tr><td colspan="2" bgcolor="#87cefa"><?php echo $translate["setting"]["system_setting"] ?></td></tr>
            <tr><td><?php echo $translate["login"]["username"] ?></td><td><input type="text" maxlength="15" readonly value="<?php echo htmlspecialchars($data_login_name,ENT_QUOTES); ?>" name="login_name" class="string" > <?php echo $translate["message"]["usernmae_change"] ?> </td></tr>
            <tr><td><?php echo $translate["login"]["password"] ?></td><td><input type="password"maxlength="15" value="<?php echo htmlspecialchars($data_login_pwd,ENT_QUOTES); ?>" name="login_pwd" class="string" ></td></tr>
            <tr><td></td></tr>
          </table>
        </section>
    </div>

  </div>
  </div>

  </div>
  <footer>
    <table border="0" cellpadding="5">
       <tr>
       <td><input type="submit" value="<?php echo $translate["footer"]["reboot"] ?>" class="_button" name="config_button" onclick="return input_check(document.forms[0])"/></td>
  	</form>
       <td width="50"></td>
       <form name="sys2" method="post" action="programs/rtc_update.php">
         <td><input type="datetime-local"  class="form-control" id="mytime" name="time" value="<?=$NOW?>" step="1"></td>
         <td><input type="submit" value="<?php echo $translate["footer"]["time"] ?>" name="rtcupdate_button" class="_button"/></td>
       </form>
       <td width="100"></td>
       <form name="sys3" method="post" action="programs/reset_default.php">
         <td><input type="submit" value="<?php echo $translate["footer"]["initialize"] ?>" name="reset_default_button" class="_button"/></td>
       </form>
       <td width="100"></td>
       <form name="sys4" method="post" action="index.php">
         <td><input type="submit" value="<?php echo $translate["footer"]["logout"] ?>" name="logout" class="_button"/></td>
       </form>
       </tr>
    </table>
  </footer>
</body>
<script>
    document.getElementById("languageSelect").value = "<?php echo $lang; ?>";
</script>
</html>
