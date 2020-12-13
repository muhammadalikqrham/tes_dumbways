<?php 
    session_start();
    error_reporting(0);
    include 'view.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <script src="asset/js/query-3.5.1.js"></script>
    <title>DumbWays - CRUD</title>
    <style>
        .atur-lebar{
            padding-right: 30%;
            padding-left: 30%;
            /* max-width: 200px; */
        }
        .left{
            float: left;
        }
        .tengah{
            float: center;
        }
        body{
            background-color: #f5f5f0;
        }
        .bottom{
            padding-top: 13%;
        }
    </style>
</head>
<body>
    <!-- awal container -->
    <div class="container pt-5 tengah">
        <!-- awal div col-lg-12 -->
       <div class="col-lg-12">
           <!-- awal capt -->
       <div class="row">
            <div class="col-lg-10 py-5">
                <h1>DumbWays Employee</h1>
            </div>
        </div>
        <!-- akhir capt -->
        <!-- form input table_user -->
        <div class="row pt-4 shadow-sm p-3 mb-4 bg-white rounded">
            <div class="col-lg-3">
            <form action="input_user.php" class="form-group" method="POST" enctype="multipart/form-data">
           <input type="file" name="img">
            </div>
            <div class="col-lg-6">
            <div class="d-flex justify-content-center align-items-center">
                 <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama">
            </div>
            </div>
            <div class="col-lg-3 ">
                <div class="d-flex justify-content-center align-items-center">
                    <input type="submit" class="btn btn-dark atur-lebar" name="add" value="Add Character">
                </div>
            </div>    
            </form>  
        </div>
        <!-- akhir input -->
        <!-- awal view content -->
        <?php 
        while ($row = mysqli_fetch_array($query)) { 
    ?>
        <div class="row py-2  shadow-sm p-3 mb-5 bg-white rounded">
           <div class="col-lg-12">
               <!-- card -->
           <div class="" style="max-width: 100%;">
                <div class="row no-gutters">
                    <!-- image -->
                    <div class="col-md-3">
                        <img src="data:image;base64,<?= base64_encode($row['photo'])?>" alt="" class="card-img" style="max-height : 250px; max-width: 250px;">
                    </div>
                    <!-- image -->
                    <!-- card body -->
                    <div class="col-md-9">
                        <div class="card-body">
                            <!-- content + bbutton -->
                            <div class="left">
                                <h2><?=$row['name_user'];?></h2>
                            </div>
                            <div class="d-flex justify-content-end align-items-center">
                            <a class='btn btn-secondary mr-2' id="tombolUbah" type="button" data-target="#exampleModal1" data-toggle="modal" data-id="<?=$row['id_user']?>"
																								  data-nama="<?=$row['name_user']?>"
		                    >Edit</a>
                                    <a href='delete_user.php?id=<?=$row['id_user']?>' class="btn btn-dark hapus" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                    </a>
                            </div>
                            <!-- content + button -->
                            <!-- content skills -->
                            <?php 
                                    $id = $row['id_user'];
                                    $sql2 = "SELECT name_skill,id_user FROM skill_tb WHERE id_user = '$id'";
                                    $query2 = mysqli_query($koneksi,$sql2); 
                                    $total = mysqli_num_rows($query2);
                                    $a=0;
                            ?>
                            <p class="card-text"><h4 class="text-secondary">
                               <?php
                                    while ($baris = mysqli_fetch_array($query2)) { 
                                ?>
                                <?= $baris['name_skill']  ?>
                                <?php 
                                $a++;
                                if ($a < $total) {
                                    echo ",";
                                }?>
                                <?php }?>
                            </h4></p>
                            <!-- content skills -->
                            <!-- input skill -->
                            <div class="bottom">
                                <form class="form-group" action="input_skill.php" method="POST">
                                    <div class="d-flex">
                                    <div class="col-lg-10 p-0">
                                        <input type="text" class="form-control nama" name="nama_skill">
                                        <input type="hidden" value="<?= $row['id_user']?>" name="id_user"> 
                                    </div>
                                        <button type="submit" class="btn btn-dark ml-3 input_skill" name="add_skill">Input Skill</button>
                                    </div>
                                </form>
                            </div>
                            <!-- input skills -->
                            <!-- modal edi -->
                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel1">Update Data</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">    
								<form action="edit.php" method="POST" enctype="multipart/form-data">
									<div class="form-group">
											<label>Kode :</label>
											<b id="id_user" name>Tes</b><br>
											<input type="hidden" class="form-control" name="id_user" id="id_user_hide">
											<label>Nama</label>
											<input type="text" class="form-control" name="nama" id="nama">
											<label>Upload File Gambar</label>
											<input type="file" class="form-control" name="img" id='gambar'>
									</div>
                                    <hr>
							</div>
                            <div class="modal-body">    
									<div class="form-group">
                                    <label>Nama Skill</label>
                                    <?php
                                    $idUser = $row['id_user']; 
                                    $sqlSkill = "SELECT * FROM skill_tb WHERE id_user = '$idUser'";
                                    $query_run = mysqli_query($koneksi,$sqlSkill);
                                    while ($isi = mysqli_fetch_array($query_run)) {
                                      ?>  
                                            <input type="hidden" class="form-control" name="id_skill[]" id="id_skill_hide" value="<?=$isi['id_skill']?>">
                                            <br>
                                            <div class="d-flex">
                                            <div class="col-lg-10">
                                            <input type="text" class="form-control" name="nama_skill[]" value="<?=$isi['name_skill'];?>">
                                            </div>
                                            <div class="col-lg-1">
                                            <a href='delete_skill.php?id=<?=$isi['id_skill']?>' class="btn btn-dark hapus" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                            </a>
                                            </div>
                                            </div>
                                            <?php } ?>
                                    </div>
                               
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<input type="submit" class="btn btn-primary" name="edit" value="ubah">
								</form>
							</div>
						</div>
					</div>
				</div>
                <!-- modal edit -->
                        </div>
                    </div>
                    <!-- card-body -->
                 </div>
            </div>
            <!-- card -->
           </div>
        </div>
        <?php }?>
        <!-- akhir view content -->
       </div>
       <!-- akhir col-lg-12 -->
    </div>
    <!-- akhir container -->
    
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/sweetalert.js"></script>
<script>
$(document).on("click","#tombolUbah",function(){
		let id = $(this).data('id');
		let nama = $(this).data('nama');
		$(".modal-body #id_user").html(id);
		$(".modal-body #nama").val(nama);
		$(".modal-body #id_user_hide").val(id);
	})
    var id = '';
    $('.nama').on('input',function(){
         id = $(this).val();
    })
    console.log(id)
    $('.input_skill').on('click',function(e)
    {
        if($('.nama').val()== "")
        {
            e.preventDefault();
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Masukkan Nama Skill Terlebih Dahulu' 
            })
        }
    })
    $('.hapus').on('click',function(e){
		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Anda yakin ingin menghapus data ini ?',
			text: "Data ini tidak akan dikembalikan lagi",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Hapus !'	
			}).then((result) => {
			/* Read more about isConfirmed, isDenied below */
			if (result.value) {
				document.location.href = href;
			} 
			})
		})
</script>
    <?php if ($_SESSION['notif']) :?>
<script>
   Swal.fire({
  icon: 'success',
  title: 'Berhasil',
  text: '<?=$_SESSION["notif"]?>',
})
</script>
<?php endif;
session_destroy();?>
</body>
</html>