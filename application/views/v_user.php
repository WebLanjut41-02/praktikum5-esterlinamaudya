<!DOCTYPE html>
<html>
<head>
	<title>Praktikum Pagination</title>
</head>
<body>

<h1>Praktikum Pagination</h1>
	<table border="1">
		<tr>
			<th>Nama Mahasiswa</th>
			<th>Nim</th>
			<th>Tanggal Lahir</th>
			<th>IPK</th>
            <th>Kelas</th>		
		</tr>
		<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($user as $u){ 
		?>
		<tr>
			<td><?php echo $u->namamhs; ?></td>
			<td><?php echo $u->nim ?></td>
			<td><?php echo $u->ttl ?></td>
			<td><?php echo $u->ipk ?></td>
			<td>
            
            <select name="kelas">
                <option>--Pilih Kelas--</option>
                <option>D3SI-41-02</option>
                <option>D3SI-41-01</option>
                <?php if(mysql_num_rows($data)>0){ ?>
                    <?php while($row = mysql_fetch_array($data)){ ?>
                    <option> <?php echo $row['kelas'] ?> </option>
                    <?php } ?>
                    <?php } ?>
                    </select>
                    <br> <center> <input type="submit" value="OK" name="ok_submit"/>
                    </center>
            </select>
            </td>
            <form method="POST" action="<?php echo base_url()?>cipage/edit?nim=<?php echo $u->nim?>">
            <input type="submit" name="edit" value="edit">
            </form>
            <form method="POST" action="<?php echo base_url()?>cipage/hapus?nim=<?php echo $u->nim?>">
            <input type="submit" name="edit" value="hapus">
            </form>
		</tr>
	<?php } ?>
	</table>
	<br/>
	<?php 
	echo $this->pagination->create_links();
	?>
</body>
</html>