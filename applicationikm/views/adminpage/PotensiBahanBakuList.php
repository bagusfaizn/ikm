<body>

    <body>
        <section id="header-map">
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 news-section">

                        <div class="table-responsive">
                            <div id="tableheader">
                                <!--<div class="nopadding"><button type="button" style="float:left; margin-right:10px;" class="btn btn-themeBackground" data-toggle="modal" data-target="#modalProduk">Tambah</button></div>-->
                                <?php echo anchor('adminpage/PotensiBahanBaku/AddPotensiBahanBaku', '<button type="button" class="btn btn-themeBackground" style="float:left; margin-right:10px;">Add New Potensi Bahan Baku</button>') ?>
		  		                    <div class="search">
                                    <select id="columns" onchange="sorter.search('query')"></select>
                                    <input type="text" id="query" onkeyup="sorter.search('query')" />
                                </div>
                                <span class="details">
						<div>Records <span id="startrecord"></span>-<span id="endrecord"></span> of <span id="totalrecords"></span></div>
                            <div><a href="javascript:sorter.reset()">reset</a></div>
                            </span>
                        </div>
                        <!--<h4 class="section-title">Daftar Bahan Baku</h4> -->
                        <h3 class="section-title">Potensi Bahan Baku</h3>
                        <table cellpadding="0" cellspacing="0" border="0" id="table" class="table tinytable">
                            <thead>
                                <tr>
                                    <th class="nosort">
                                        <h3>Kategori</h3>
									</th>
                                    <th>
                                        <h3>Nama Bahan</h3></th>
                                    <th width="10px">
                                        <h3>Detail</h3></th>
                                    <th width="10px">
                                        <h3>Delete</h3></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $kat = "";
							foreach ($ProdukData as $row)
							{ 

                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['arti']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['nama']; ?>
                                        </td>
                                        <td>
											<?php echo anchor('adminpage/PotensiBahanBaku/getDetail/'.$row['idx'], '<i class="fa fa-pencil"></i>', 'class="link-class"') ?>
                                        </td>
                                        <td style="text-align:center;">
                                            <?php $onclick = array('class'=> "link-class", 'onclick'=>"return confirm('Are you sure?')");?>
                                                <?php echo anchor('adminpage/PotensiBahanBaku/Delete/'.$row['idx'], '<i class="fa fa-trash"></i>', $onclick); ?></td>
                                    </tr>
                                    <?php }
							?>
                            </tbody>
                        </table>
                    </div>
                    <div id="tablefooter">
                        <div id="tablenav">
                            <div>
                                <img src="<?php echo ASSET_PATH; ?>backend/images/first.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
                                <img src="<?php echo ASSET_PATH; ?>backend/images/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
                                <img src="<?php echo ASSET_PATH; ?>backend/images/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
                                <img src="<?php echo ASSET_PATH; ?>backend/images/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
                            </div>
                            <div>
                                <select id="pagedropdown"></select>
                            </div>
                            <div>
                                <a href="javascript:sorter.showall()">view all</a>
                            </div>
                        </div>
                        <div id="tablelocation">
                            <div>
                                <select onchange="sorter.size(this.value)">
                                    <option value="5">5</option>
                                    <option value="10" selected="selected">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <span>Entries Per Page</span>
                            </div>
                            <div class="page">Page <span id="currentpage"></span> of <span id="totalpages"></span></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        </html>