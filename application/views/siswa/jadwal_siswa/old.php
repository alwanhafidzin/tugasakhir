      <!-- <table class="table table-bordered table-striped">
                    <tr>
                        <td>No</td>
                        <td>Hari</td>
                        <td>Mapel</td>
                        <td>Total</td>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($jadwal_siswa->result_array() as $source1) {
                        ?>
                        <tr>
                            <?php
                            $source2 = $this->db->query('select * from jadwal where id_hari = "'.$source1['id_hari'].'" AND id_m_perminggu="'.$source1['id_m_perminggu'].'" AND kode_kelas="'.$source1['kode_kelas'].'"');
                            $total_source2 = $source2->num_rows();
                            $source3 = $source2->result_array();
                            $rowspan = true;
                            ?>
                            <td rowspan="<?php echo $total_source2 ?>"><?php echo $no; ?></td>
                            <td rowspan="<?php echo $total_source2 ?>"><?php echo $source1['id_hari']; ?></td>
                            <?php foreach ($source3 as $source3) { ?>
                                <td><?php echo $source3['id_m_perminggu'] ?></td>
                                <?php
                                if ($rowspan) {
                                    $q = $this->db->query('SELECT SUM(`id_m_perminggu`) as `nb` FROM `jadwal` WHERE `id_hari` = "'.$source1['id_hari'].'" AND `id_m_perminggu`="'.$source1['id_m_perminggu'].'" AND `kode_kelas`="'.$source1['kode_kelas'].'"');
                                    echo "<td rowspan='{$total_source2}'>" . $q->row()->nb . '</td>';
                                    $rowspan = false;
                                }
                                ?>
                            </tr>
                      <?php } ?>
                        <?php
                       $no++;
                    }
                    ?>
                </table> -->