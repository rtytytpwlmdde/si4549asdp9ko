<table class="table mb-0 " id="pegawai">
                    <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                    <tr>
                        <th scope="col" class="border-0">No</th>
                        <th scope="col" class="border-0">ID Peminjaman </th>
                        <th scope="col" class="border-0">ID Peminjam</th>
                        <th scope="col" class="border-0">Nama Peminjam</th>
                        <th scope="col" class="border-0">Tanggal Peminjaman</th>
                        <th scope="col" class="border-0">Jenis</th>
                        <th scope="col" class="border-0">Status</th>
                        <th scope="col" class="border-0">Batalkan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        foreach ($peminjaman as $u){ 
                        ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><a href="<?php echo base_url(). 'mahasiswa/detail_peminjaman/'.$u->id_peminjaman.'/'.$u->jenis_peminjaman; ?>"><?php echo $u->id_peminjaman ?></a></td>
                        <td><?php echo $u->id_peminjam ?></td>
                        <td>
                            <?php foreach ($mahasiswa as $a){if ($a->nim == $u->id_peminjam) :echo $a->nama;endif;}  ?>
                            <?php foreach ($dosen as $a){if ($a->NIP == $u->id_peminjam) :echo $a->Nama;endif;}  ?>
                        </td>
                        <td><?php echo $u->tanggal_peminjaman ?></td>
                        <td> <span 
                                <?php if($u->jenis_peminjaman == 'rutin'){ ?>
                                    class="text-primary"
                                <?php }else if($u->jenis_peminjaman == 'non rutin'){ ?>
                                    class="text-dark"
                                <?php } else{ ?>
                                    class="text-muted"
                                <?php } ?>
                            ><?php echo $u->jenis_peminjaman ?></span>
                        </td>
                        <td>
                            <span 
                                <?php if($u->status_peminjaman == 'terkirim'){ ?>
                                    class="text-warning"
                                <?php }else if($u->status_peminjaman == 'tolak'){ ?>
                                    class="text-danger"
                                <?php }else if($u->status_peminjaman == 'setuju'){ ?>
                                    class="text-success"
                                <?php } else{ ?>
                                    class="text-secondary"
                                <?php } ?>
                            ><?php echo $u->status_peminjaman ?></span>
                        </td>
                        <td class="sorting_1" style="">
                            <?php if($u->status_peminjaman == "setuju"){ ?>
                                <a href=""  class="mb-2 btn btn-sm btn-outline-warning mr-1" onclick="return tidak_dapat_batal();" title="Batalkan Peminjaman">
                                <i class="material-icons">cancel</i>
                            </a>
                            <?php }else{ ?>

                            <a href="<?php echo site_url('mahasiswa/batal_peminjaman/'.$u->id_peminjaman.'/'.$u->id_peminjam); ?>"  class="mb-2 btn btn-sm btn-outline-warning mr-1" onclick="return batal();" title="Batalkan Peminjaman">
                                <i class="material-icons">cancel</i>
                            </a>
                            <?php }
                                ?>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>