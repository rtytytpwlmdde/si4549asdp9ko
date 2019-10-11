<!doctype html>
<html>
  <body style="">
    <div style="margin: 0; padding: 0;background: #fff; width: 21cm; height: 29.7cm; font-family:calibri;">
    <div style="padding-left:80px; padding-top:40px; padding-right:80px;" >
        <div class="bg-white py-4">
        <div class=" pt-0">
            <div style="">
                <div class="" style="overflow-x:auto; ">
                <table>
                    <thead >
                    <tr >
                    <td><img src="<?php echo base_url(); ?>/assets/images/ub.png" style="max-width: 120px;"></td>
                    <td style="padding-left:1.5cm; text-align: center;">
                    <div style="text-align:center;">KEMENTERIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI</div>
                    <div style="text-align:center;">UNIVERSITAS BRAWIJAYA</div>
                    <div style="font-weight:bold">FAKULTAS EKONOMI DAN BISNIS</div>
                    <div style="font-size:12px;">Jl. MT. Haryono 165 Malang, 65145, Indonesia</div>
                    <div style="font-size:12px;">Telp. : +62-341-555000; Fax : +341-553834</div>
                    <div style="font-size:12px; ">http://feb.ub.ac.id/  <span style="color:#fff;">aaa</span> E-mail : feb@ub.ac.id</div>
                    </td>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <p style="border-bottom: 2.8px solid black; "></p>
                <p style="text-align:center; font-size:21px;">FORM PEMINJAMAN RUANG DAN SARANA PRASARANA</p>

                <table> 
                <?php 
                    $no = 1;
                    foreach ($peminjaman_non_rutin as $u){ 
                    ?>
                    <thead >
                        <tr>
                        <td>
                           <div>NIM/NIK<span style="color:#fff;">aaaaaa'aaa</span>: <?php echo $u->id_peminjam ?></div>
                           <div>Nama<span style="color:#fff;">aaaaaaaaaaaa</span>: 
                           <?php foreach ($dosen as $a){if ($a->NIP == $u->id_peminjam) :echo $a->Nama;endif;}  ?>
                           <?php foreach ($mahasiswa as $a){if ($a->nim == $u->id_peminjam) :echo $a->nama;endif;}  ?>
                           </div>
                           <div>Penyelenggara <span style="color:#fff;">aaaa</span>: <?php echo $u->penyelenggara;?></div>
                          <div><span style="color:#fff;">aaaaaaaaaaaa</span></div>

                        <td style="padding-left:2cm; text-align: left;">
                           <div>Jenis Peminjaman<span style="color:#fff;">aa'a</span>: Khusus</div>
                           <div>Tanggal Pemakaian<span style="color:#fff;">aa</span>: <?php $date = date_create($u->tanggal_pemakaian); echo date_format($date, "d/m/Y") ; ?></div>
                           <div>Jam 
                           <span style="color:#fff;">aaaaaaaaaaaaaaa</span>: 
                           <?php 
                            if (strlen($u->jam_mulai_peminjaman) == 1){
                            echo "0".$u->jam_mulai_peminjaman.":00"; 
                            }else{
                                echo $u->jam_mulai_peminjaman.":00"; 
                            }
                            
                            ?> - 
                            <?php
                            if (strlen($u->jam_selesai_peminjaman) == 1){
                                echo "0".$u->jam_selesai_peminjaman.":00"; 
                            }else{
                                echo $u->jam_selesai_peminjaman.":00"; 
                            } 
                           ?>
                           
                           </div>
                           <div>Status<span style="color:#fff;">aaaiaa'aaaaaaa</span>: <?php echo $u->status ?></div>
                        </td>
                        </tr>
                     
                    </thead>
                    <tbody>
                    </tbody>
                    <?php } ?>
                </table>


                <p>Ruangan : </p>
                <table style="border-collapse: collapse;width: 100%; text-align:center; " border="1">
                <thead  class="">
                <tr style="">
                    <th style="width: 20%;">No</th>
                    <th>Ruangan</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    foreach ($detail_peminjaman_non_rutin as $u){ 
                    ?>
                <tr style="">
                    <td style="width: 20%;"><?php echo $no++;?></td>
                    <td><?php foreach ($ruangan as $a){if ($a->id_ruangan == $u->id_ruangan) :echo $a->ruangan;endif;}  ?></td>
                </tr>
                
                <?php } ?>
                <tr style="">
                    <td>Jumlah</td>
                    <td><?php echo $no-1; ?></td>
                </tr>
                
                </tbody>
                 </table>

                 <table style="padding-top:100px;  width: 100%; "> 
                <?php 
                    $no = 1;
                    foreach ($peminjaman_non_rutin as $u){ 
                    ?>
                    <thead >
                        <tr>
                        <td style="width: 60%;">
                           <div>Keterangan<span style="color:#fff;"></span>: <br><?php echo $u->keterangan ?></div><br><br><br><br><br>
                          <br>

                        <td style="width: 40%;">
                           <div>Malang, <?php echo date("d-m-Y") . "<br>"?></div>
                           <div>Kepala Tata Usaha,<br><br><br><br>
                           <?php  foreach ($ktu as $k){ ?>
                           <div><u><?php echo $k->Nama;?></u><br>
                           <div>NIP.<?php echo $k->NIP;?><br>
                            <?php } ?>
                        </td>
                        </tr>
                     
                    </thead>
                    <tbody>
                    </tbody>
                    <?php } ?>
                </table>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
  </body>
</html>