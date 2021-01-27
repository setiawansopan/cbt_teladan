<table class="kop" width="100%" align="center" border="0">
    <tr>
        <td width="20%"></td>
        <td width="60%"></td>
        <td width="20%"></td>
    </tr>
    <tr>
        <td align="right">
            <img style="height: 100px" src="<?php echo base_url(); ?>images/systems/logo_diy.png">
        </td>
        <td align="center">
            <p style="font-size: 14px; color: #000000;">PEMERINTAH DAERAH DAERAH ISTIMEWA YOGYAKARTA<br>DINAS PENDIDIKAN, PEMUDA DAN OLAHRAGA<br><strong><?php echo strtoupper($sekolah->set_sekolah); ?></strong></p>
            <img style="height: 30px;" src="<?php echo base_url()?>images/systems/kop.jpg">
            <p style="font-size: 10px; color: #000000;"><?php echo $sekolah->set_alamat." Telp. ".$sekolah->set_telpon.", Fak ".$sekolah->set_fax." ".$sekolah->set_kab." ".$sekolah->set_pos; ?>
                <br><?php echo "Website : ".$sekolah->set_web." ; e-mail : ".$sekolah->set_email; ?></p>
        </td>
        <td></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
    	<td colspan="3" >
           <center>
                <img style="width: 100%; height: 10px;" src="<?php echo base_url(); ?>images/systems/line.png" align="center">
            </center>

    	</td>
    </tr>
</table>