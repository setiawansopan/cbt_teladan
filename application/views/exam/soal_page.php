<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Penilaian Berbasis Komputer</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url()?>/assets/img/icon.ico" type="image/x-icon"/>
	
	<!-- Fonts and icons -->
	<script src="<?php echo base_url()?>/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url()?>/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/atlantis.css">
   <style>
   		.font-link {
			color: #ffffff;
			font-size: 15px;
	      font-weight: regular;
	      font-family: arial;
   		}
      .blink {
      animation: blinker 0.6s linear infinite;
      color: #ffffff;
      font-size: 15px;
      font-weight: regular;
      font-family: arial;
      }
      @keyframes blinker {  
      50% { opacity: 0; }
      }
      .blink-one {
      animation: blinker-one 1s linear infinite;
      }
      @keyframes blinker-one {  
      0% { opacity: 0; }
      }
      .blink-two {
      animation: blinker-two 1.4s linear infinite;
      }
      @keyframes blinker-two {  
      100% { opacity: 0; }
      }
      .link {
      	color: #000000;
      	text-decoration: none;

      }
    </style>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #006391;" oncontextmenu="return false;">
	<div class="wrapper fullheight-side no-box-shadow-style">
		
		<div class="page-inner">
			<div class="row justify-content-center">
				<div class="col-12 col-lg-10 col-xl-9">
					<h1 style="font: bold; color: #ffffff;"><i class="fas fa-graduation-cap icon-big" style="color: #ffffff;"></i>&nbsp;CBT TELADAN</h1>
					<p style="font: bold; color: #ffffff;"><?php echo $review->ujian_nama.' - '.$review->mapel_nama.' - Kelas '.$review->ujian_tingkat; ?></p>
					<div class="page-divider"></div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<br>
								<!-- bagian header -->
								<div class="card-header">
									<div class="d-flex align-items-center">
									
										<!-- judul header -->
										<table width=100%>
										<!-- <tr>
	  										<td colspan="2" align="center"><h3 class="title"><strong><font color="#000000">LEMBAR SOAL CBT</strong></h3></td>
										</tr> -->
										<tr>
	  										<td width=25%><b><h5 id="no-soal" class="sub float-left">NOMOR : <?php echo $n;?></h5></b></td>
											<td width=50% align="center"><h3><strong><font color="#000000">LEMBAR SOAL</strong></h3></td>
											<td width=25%><font color="red"><b><h5 id="ujian-time" class="sub float-right"></h5></b></font></td>
										</tr>
										</table>
										
										<!-- sampai sini judul header -->

									</div>
								</div>
								<!-- selesai header -->

	  							<!-- bagian tengan soal jangan di utak atik -->
								<div class="container-fluid">
									<br>
									<div class="row">
										<div class="col-md-12">
											<!-- <h6 class="text-uppercase fw-bold">Skor : <?php //echo $soal->soal_skor; ?></h6>
											<br> -->
											<div id="soal-teks" class="invoice-detail">
											<?php echo $soal->soal_teks; ?>	
											</div>
											<br>
											<div class="invoice-detail">
											<!-- <h6 id="jawaban" class="text-uppercase mt-4 mb-3 fw-bold">
											JAWABAN : <?php //echo $soal->pj_jawaban; ?>
											</h6> -->
											<br>
											<form id="formJawaban" action="<?php echo base_url('index.php/exam/soal/act')?>" method="POST">
											<div class="form-group form-jawaban"  align="center">
												<div class="selectgroup selectgroup-pills">
													<label class="selectgroup-item">
														<input type="radio" name="pj_jawaban" id="pj_jawaban_a" value="A" class="selectgroup-input" <?php if($soal->pj_jawaban == 'A') echo 'checked=""';?>>
														<span class="selectgroup-button">A</span>
													</label>
													<label class="selectgroup-item">
														<input type="radio" name="pj_jawaban" id="pj_jawaban_b" value="B" class="selectgroup-input" <?php if($soal->pj_jawaban == 'B') echo 'checked=""';?>>
														<span class="selectgroup-button">B</span>
													</label>
													<label class="selectgroup-item">
														<input type="radio" name="pj_jawaban" id="pj_jawaban_c" value="C" class="selectgroup-input" <?php if($soal->pj_jawaban == 'C') echo 'checked=""';?>>
														<span class="selectgroup-button">C</span>
													</label>
													<label class="selectgroup-item">
														<input type="radio" name="pj_jawaban" id="pj_jawaban_d" value="D" class="selectgroup-input" <?php if($soal->pj_jawaban == 'D') echo 'checked=""';?>>
														<span class="selectgroup-button">D</span>
													</label>
													<label class="selectgroup-item">
														<input type="radio" name="pj_jawaban" id="pj_jawaban_e" value="E" class="selectgroup-input" <?php if($soal->pj_jawaban == 'E') echo 'checked=""';?>>
														<span class="selectgroup-button">E</span>
													</label>
												</div>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="pj_ragu" name="pj_ragu" value="1" <?php if($soal->pj_ragu == '1') echo 'checked';?>>
													<label class="custom-control-label" for="pj_ragu">Ragu-ragu</label>
												</div>
											</div>
											<p id="tes-text"></p>
											<hr>
											<div class="form-group" align="center">
												<input type="hidden" id="pj_id" name="pj_id" value="<?php echo $soal->pj_id; ?>">
												<input type="hidden" id="soal_id" name="soal_id" value="<?php echo $soal->pj_soal_id; ?>">
												<input type="hidden" name="pu_durasi" id="pu_durasi">
												<input type="hidden" id="n" name="n" value="<?php echo $n; ?>">
												<input type="hidden" id="pu_id" name="pu_id" value="<?php echo $review->pu_id; ?>">
												<input type="button" id="butFirst" name="first" value="FIRST" class="btn btn-black d-none"> 
												&nbsp;
												<input type="button" id="butPrev" name="prev" value="PREV" class="btn btn-warning d-none"> 
												&nbsp;
												<input type="button" id="butNext" name="next" value="NEXT" class="btn btn-primary">
												&nbsp;
												<input type="button" id="butLast" name="last" value="LAST" class="btn btn-black">
												<button type="button" id="butSelesai" class="btn btn-danger d-none" data-toggle="modal" data-target="#modalSelesai">SELESAI</button>
											</div>
											
											</div>	
											
											<div>
									&nbsp;
									</div>

										</div>	
									<!-- batas potong sini -->
									</div>
								</div>

							</div>
	  						<!-- bagian tengah soal sampai disini -->

	  						<!-- bagian lembar jawaban -->
							<div class="card">
							<!-- judul lembar jawab -->
								<div class="card-header">
									<div class="d-flex align-items-center">	
									
									<!-- judul header -->
									<table width=100%>
										<!-- <tr>
	  										<td colspan="2" align="center"><h3 class="title"><strong><font color="#000000">LEMBAR SOAL CBT</strong></h3></td>
										</tr> -->
										<tr>
											<td width=50% align="center"><h3><strong><font color="#000000">LEMBAR JAWABAN</strong></h3></td>
										</tr>
										</table>
										
										<!-- sampai sini judul header -->
	  								
									</div>
								</div>
	  						<!-- judul sampai sini -->

								<div class="card-body" align='center'>
									<table width="100%" border="0" cellspacing="0" cellpadding="2" align='center'>
									<?php
									$no = 0;
									foreach ($lembar_jawab as $value) {
										$lj[] = $value['pj_jawaban'];
										$lk[] = $value['pj_id'];
										$lr[] = $value['pj_ragu'];

									}
									
									for ($i=1; $i<=10 ; $i++) { 
									?>
									<tr>
										<?php
										for ($j=$i; $j<=$this->session->jum_soal; $j+=10) { 
											?>
											<td width="5%" align="center">
												<?php if($j <= $this->session->jum_soal) { ?>
												<?php echo $j ?>.<?php } ?>
											</td> 
											<td width="4%" align="left" height="4%" >
											<?php if($j <= $this->session->jum_soal) { ?>
												<input id="<?php echo $lk[$j-1] ?>" style="font: color=#ffffff;" type="button" class="btn btn-icon btn-round btn-sm ljwb<?php echo $j; ?>
												<?php 
												if($j == $n) echo " blink bg-danger"; 
												else if(!empty($lr[$j-1])) echo "font-link bg-warning"; 
												else if($j != $n) echo "font-link bg-black";
												else echo ""; ?>" 
												onclick="goToSoal('<?php echo $lk[$j-1]?>','<?php echo $j;?>');"
												value="<?php  echo $lj[$j-1]; ?>">

											<?php } ?> 
											</td>
											<td>&nbsp;&nbsp;&nbsp;</td>
										<?php }
										?>
									</tr>
									
									<?php }
									?>
									</table>
									<br>
									<table id="lembarJwb" width="100%" border="0" cellspacing="0" cellpadding="2"></table>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- Popup Konfirmasi Selesai Ujian -->
		<div class="modal fade" id="modalSelesai" tabindex="-1" role="dialog" aria-labelledby="modalSelesaiLabel" aria-hidden="true">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
        			<form action="<?php echo base_url('index.php/exam/soal/selesai')?>" method="POST">
	      				<div class="modal-header">
	        				<h5 class="modal-title" id="modalSelesaiLabel">KONFIRMASI</h5>
	      				</div>
	      				<div class="modal-body">
        					<div class="col-md-12 custom-control custom-checkbox">
							    <input type="checkbox" id="agree" class="custom-control-input" name="setuju" value="1" required>
							    <label class="custom-control-label" for="agree">Selesaikan ujian dan keluar dari lembar ujian.</label>
							    <p>Anda tidak dapat melanjutkan ujian kembali setelah menyelesaikan penilaian ini.</p>
							</div>
	      				</div>
	      				<div class="modal-footer">
	        				<button type="button" class="btn btn-success" data-dismiss="modal">Batalkan</button>
	        				<input type="submit" class="btn btn-danger" name="submit" value="Selesai" />
	      				</div>
        			</form>
    			</div>
  			</div>
		</div>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="<?php echo base_url()?>/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/core/popper.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="<?php echo base_url()?>/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- Bootstrap Toggle -->
	<script src="<?php echo base_url()?>/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<!-- jQuery Scrollbar -->
	<script src="<?php echo base_url()?>/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Sweet Alert -->
	<script src="<?php echo base_url()?>/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<!-- Atlantis JS -->
	<script src="<?php echo base_url()?>/assets/js/atlantis.min.js"></script>

	<script>
		$(document).ready(function() {
		
		// Pengaturan Timer

            /** Membuat Waktu Mulai Hitung Mundur Dengan 
                * var detik;
                * var menit;
                * var jam;
            */
			<?php 
				$key_durasi = $this->session->pu_durasi;
				$durasi = explode(":", $key_durasi);
				$durasi2 = "+".$durasi[0]." hour +".$durasi[1]." minutes +".$durasi[2]." seconds";
				$dateBatas = date("M d, Y H:i:s", strtotime($durasi2, strtotime($key_durasi))); 
			?>
            var jam     = <?php echo $durasi[0]; ?>;
            var menit   = <?php echo $durasi[1]; ?>;
            var detik   = <?php echo $durasi[2]; ?>;
            //var durasi_ujian = document.getElementById("pu_durasi").value;
                  
            /**
               * Membuat function hitung() sebagai Penghitungan Waktu
            */
            function hitung() {

                setTimeout(hitung,1000);
  
                if(menit < 10 && jam == 0){
                	$('#ujian-time').css("color:red");
                };
  
                $('#ujian-time').html(
                    '( ' + jam + ' jam ' + menit + ' mnt ' + detik + ' dtk )'
                );

                $('#pu_durasi').val(
                    jam + ':' + menit + ':' + detik
                );

                detik --;
  
                if(detik < 0) {
                    detik = 59;
                    menit --;
  
                    if(menit < 0) {
                        menit = 59;
                        jam --;  
                    } 
                }

                if(jam == 0 && menit == 0 && detik == 0) { 
                    clearInterval(hitung); 

	            	alert('Waktu Anda telah habis');
	                location.href = '<?php echo base_url('index.php/exam/soal/selesai') ?>';				             
                }  
            } 

             hitung();
        });

        // Pengaturan Alert
		var AlertSelesai = function() {

			//== Demos
			var initDemos = function() {
				$('#butSelesai').on('click',function(e){
				    e.preventDefault();
				    var form = $(this).parents('form');
				    swal({
				        title: "KONFIRMASI : Menyelesaikan Penilaian..?",
				        text: "Kamu akan menyelesaikan ujian dan keluar dari lembar ujian",
				        type: "warning",
				        buttons:{
							cancel: {
								visible: true,
								text : 'Tidak',
								className: 'btn btn-danger'
							},        			
							confirm: {
								text : 'Ya, Selesaikan',
								className : 'btn btn-success'
							}
						}
				    }, function(isConfirm){
				        if (isConfirm) form.submit();
				    });
				});
			};

			return {
				//== Init
				init: function() {
					initDemos();
				},
			};
		}();

		//== Class Initialization
		// jQuery(document).ready(function() {
		// 	AlertSelesai.init();
		// });

	</script>
	<script>
		function link(pj_id, n) {
			//get value
			var pu_durasi = document.getElementById("pu_durasi").value;

			//ambil ragu2
			var inputElements = document.getElementsByClassName('custom-control-input');
			for(var i=0; inputElements[i]; ++i){
			      if(inputElements[i].checked){
			           pj_ragu = inputElements[i].value;
			           break;
			      }
			      else {
			  		var pj_ragu = '';
			  }
			}

			//ambil jawaban
			var radios = document.getElementsByName('pj_jawaban');
			for (var i = 0, length = radios.length; i < length; i++) {
			  if (radios[i].checked) {
			    var pj_jawaban = radios[i].value;
			    break;
			  }
			  else {
			  	var pj_jawaban = '';
			  }
			} //+'&pj_jawaban='+pj_jawaban+'&pj_id='+pj_id+'&pj_ragu='+pj_ragu


			//redirect
			document.location = '<?php echo base_url('index.php/exam/soal/act');?>?link=1&pj_id='+pj_id+'&n='+n;
		}

		function goToSoal(pj_id, n_soal) { 
			var pj_id  = pj_id;
            var n = n_soal;
            var jum_soal = <?php echo $this->session->jum_soal; ?>;
            var pu_id = "<?php echo $this->session->pu_id; ?>";
            $.ajax({
                url : "<?php echo base_url('index.php/exam/soal/go_to_soal')?>",
                type : "POST",
                data : {pj_id: pj_id, n: n, jum_soal: jum_soal, pu_id: pu_id},
                async : true,
                dataType : 'json',
                success: function(data){
                	$("#n").val(data.n_new);
                	$("#pj_id").val(data.soal['pj_id']);
                	$("#soal_id").val(data.soal['soal_id']);
                	$("#soal-teks").html(data.soal['soal_teks']);
                	$("#no-soal").html("NOMOR : "+data.n_new);
                	$("#jawaban").html("JAWABAN : "+data.soal.pj_jawaban);
                	setJawaban(data.soal.pj_jawaban, data.soal.pj_ragu);
                	setLembarJawab(data.n_new, data.soal.pj_ragu);

                    if(data.n_new == 1) {
                        $("#butFirst").addClass("d-none");
                        $("#butPrev").addClass("d-none");
                        $("#butNext").removeClass("d-none");
                        $("#butLast").removeClass("d-none");
                        $("#butSelesai").addClass("d-none");
                    } else if(data.n_new == data.jum_soal) {
                        $("#butFirst").removeClass("d-none");
                        $("#butPrev").removeClass("d-none");
                        $("#butNext").addClass("d-none");
                        $("#butLast").addClass("d-none");
                        $("#butSelesai").removeClass("d-none");
                    } else {
                        $("#butFirst").removeClass("d-none");
                        $("#butPrev").removeClass("d-none");
                        $("#butNext").removeClass("d-none");
                        $("#butLast").removeClass("d-none");
                        $("#butSelesai").addClass("d-none");
                    }
                }
            });
            return false;
        }

        function setJawaban(jwb, pj_ragu){
        	var jawaban;
	      	if(jwb == "A") {
    			jawaban = [true, false, false, false, false];
    		} else if(jwb == "B") {
	    		jawaban = [false, true, false, false, false];
	    	} else if(jwb == "C") {
	    		jawaban = [false, false, true, false, false];
	    	} else if(jwb == "D") {
	    		jawaban = [false, false, false, true, false];
	    	} else if(jwb == "E") {
	    		jawaban = [false, false, false, false, true];
	    	} else {
	    		jawaban = [false, false, false, false, false];
	    	}

	    	$("#pj_jawaban_a").prop("checked", jawaban[0]);
			$("#pj_jawaban_b").prop("checked", jawaban[1]);
			$("#pj_jawaban_c").prop("checked", jawaban[2]);
			$("#pj_jawaban_d").prop("checked", jawaban[3]);
			$("#pj_jawaban_e").prop("checked", jawaban[4]);

			if(pj_ragu) {
				$("#pj_ragu").prop("checked", true);
			} else {
				$("#pj_ragu").prop("checked", false);
			}
	    }

	    function setLembarJawab(n_soal, pj_ragu) {
	    	for (var i = 1; i <= 10; i++) {
	    		for (var j = i; j <=100; j+=10) {
	    			if(j == n_soal) {
		    			$(".ljwb"+j).addClass("blink bg-danger");
	    			} 
	    			if(j != n_soal) {
		    			$(".ljwb"+j).removeClass("blink bg-danger");
		    			$(".ljwb"+j).addClass("font-link bg-black");
	    			}
	    		}
	    	}
	    }
	
	  $(document).ready(function(){

	    function autoSave(){
	      var pu_durasi = $('#pu_durasi').val();
	      var pu_id = "<?php echo $this->session->pu_id; ?>";
	      if(pu_durasi != '') {
	        $.ajax({
	          url:'<?php echo base_url('index.php/exam/soal/update_durasi')?>',
	          type:"POST",
	          data:{pu_durasi: pu_durasi, pu_id: pu_id},
	          async : true,
	          dataType : 'json',
	          success:function(data){
	            $("#pu_durasi").val(data.durasi);
	          }
	        });
	        return false;
	      }
	    }
	    setInterval(function(){
	      autoSave();
	    }, 60000); // simpan tiap 10 detik
	    
	    var pj_jwb = ["a", "b", "c", "d", "e"];
	    for (var i = 0; i < 5; i++) {
		    $('#pj_jawaban_'+pj_jwb[i]).change(function(){ 
	            var pj_jawaban=$(this).val();
	            var pj_id=$('#pj_id').val();
	            var pu_id = "<?php echo $this->session->pu_id; ?>";

	            $.ajax({
	                url : "<?php echo base_url('index.php/exam/soal/update_jawaban')?>",
	                type : "POST",
	                data : {pj_jawaban: pj_jawaban, pj_id: pj_id, pu_id: pu_id},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	$("#"+data[0].pj_id).val(data[0].pj_jawaban);
	                }
	            });
	            return false;
	        });
	    }


        $('#pj_ragu').change(function(){ 
            if($(this).is(":checked")){
            	var pj_ragu = '1';
            }
            else {
            	var pj_ragu = '';
            } 

            var pj_id=$('#pj_id').val();
            var pu_id = "<?php echo $this->session->pu_id; ?>";
            $.ajax({
                url : "<?php echo base_url('index.php/exam/soal/update_ragu')?>",
                type : "POST",
                data : {pj_ragu: pj_ragu, pj_id: pj_id, pu_id: pu_id},
                async : true,
                dataType : 'json',
                success: function(data){
                	if(data[0].pj_ragu == 1) {
                		$("#"+data[0].pj_id).addClass("font-link bg-warning");
				$("#"+data[0].pj_id).removeClass("font-link bg-black");
                	} else {
				$("#"+data[0].pj_id).removeClass("font-link bg-warning");
                		$("#"+data[0].pj_id).addClass("font-link bg-black");
                	}
                }
            });
            return false;
        });

        $('#butFirst').click(function(){ 
            var ujian_id = "<?php echo $this->session->ujian_id; ?>";
            var peserta_id = "<?php echo $this->session->peserta_id; ?>";
            var jum_soal = <?php echo $this->session->jum_soal; ?>;
            var pu_id = "<?php echo $this->session->pu_id; ?>";
            $.ajax({
                url : "<?php echo base_url('index.php/exam/soal/soal_first')?>",
                type : "POST",
                data : {ujian_id: ujian_id, peserta_id: peserta_id, jum_soal: jum_soal, pu_id: pu_id},
                async : true,
                dataType : 'json',
                success: function(data){
                	$("#n").val(1);
                	$("#pj_id").val(data.soal['pj_id']);
                	$("#soal_id").val(data.soal['soal_id']);
                	$("#soal-teks").html(data.soal['soal_teks']);
                	$("#no-soal").html("NOMOR : "+1);
                	$("#jawaban").html("JAWABAN : "+data.soal.pj_jawaban);
                	setJawaban(data.soal.pj_jawaban, data.soal.pj_ragu);
                	setLembarJawab(1, data.soal.pj_ragu);

                    $("#butFirst").addClass("d-none");
                    $("#butPrev").addClass("d-none");
                    $("#butNext").removeClass("d-none");
                    $("#butLast").removeClass("d-none");
                    $("#butSelesai").addClass("d-none");
                }
            });
            return false;
        });

        $('#butLast').click(function(){ 
            var ujian_id = "<?php echo $this->session->ujian_id; ?>";
            var peserta_id = "<?php echo $this->session->peserta_id; ?>";
            var jum_soal = <?php echo $this->session->jum_soal; ?>;
            var pu_id = "<?php echo $this->session->pu_id; ?>";
            $.ajax({
                url : "<?php echo base_url('index.php/exam/soal/soal_last')?>",
                type : "POST",
                data : {ujian_id: ujian_id, peserta_id: peserta_id, jum_soal: jum_soal, pu_id: pu_id},
                async : true,
                dataType : 'json',
                success: function(data){
                	$("#n").val(data.n);
                	$("#pj_id").val(data.soal['pj_id']);
                	$("#soal_id").val(data.soal['soal_id']);
                	$("#soal-teks").html(data.soal['soal_teks']);
                	$("#no-soal").html("NOMOR : "+data.n);
                	$("#jawaban").html("JAWABAN : "+data.soal.pj_jawaban);
                	setJawaban(data.soal.pj_jawaban, data.soal.pj_ragu);
                	setLembarJawab(data.n, data.soal.pj_ragu);

                    $("#butFirst").removeClass("d-none");
                    $("#butPrev").removeClass("d-none");
                    $("#butNext").addClass("d-none");
                    $("#butLast").addClass("d-none");
                    $("#butSelesai").removeClass("d-none");
                }
            });
            return false;
        });

        $('#butPrev').click(function(){ 
            var pj_id=$('#pj_id').val();
            var n = $("#n").val();
            var jum_soal = <?php echo $this->session->jum_soal; ?>;
            var pu_id = "<?php echo $this->session->pu_id; ?>";
            $.ajax({
                url : "<?php echo base_url('index.php/exam/soal/soal_prev')?>",
                type : "POST",
                data : {pj_id: pj_id, n: n, jum_soal: jum_soal, pu_id: pu_id},
                async : true,
                dataType : 'json',
                success: function(data){
                	$("#n").val(data.n_new);
                	$("#pj_id").val(data.soal['pj_id']);
                	$("#soal_id").val(data.soal['soal_id']);
                	$("#soal-teks").html(data.soal['soal_teks']);
                	$("#no-soal").html("NOMOR : "+data.n_new);
                	$("#jawaban").html("JAWABAN : "+data.soal.pj_jawaban);
                	setJawaban(data.soal.pj_jawaban, data.soal.pj_ragu);
                	setLembarJawab(data.n_new, data.soal.pj_ragu);

                	if(data.n_new == 1) {
                        $("#butFirst").addClass("d-none");
                        $("#butPrev").addClass("d-none");
                        $("#butNext").removeClass("d-none");
                        $("#butLast").removeClass("d-none");
                        $("#butSelesai").addClass("d-none");
                    } else if(data.n_new == data.jum_soal) {
                        $("#butFirst").removeClass("d-none");
                        $("#butPrev").removeClass("d-none");
                        $("#butNext").addClass("d-none");
                        $("#butLast").addClass("d-none");
                        $("#butSelesai").removeClass("d-none");
                    } else {
                        $("#butFirst").removeClass("d-none");
                        $("#butPrev").removeClass("d-none");
                        $("#butNext").removeClass("d-none");
                        $("#butLast").removeClass("d-none");
                        $("#butSelesai").addClass("d-none");
                    }
                }
            });
            return false;
        });

        $("#butNext").click(function(){ 
            var pj_id  =$('#pj_id').val();
            var n = $("#n").val();
            var jum_soal = <?php echo $this->session->jum_soal; ?>;
            var pu_id = "<?php echo $this->session->pu_id; ?>";
            $.ajax({
                url : "<?php echo base_url('index.php/exam/soal/soal_next')?>",
                type : "POST",
                data : {pj_id: pj_id, n: n, jum_soal: jum_soal, pu_id: pu_id},
                async : true,
                dataType : 'json',
                success: function(data){
                	$("#n").val(data.n_new);
                	$("#pj_id").val(data.soal['pj_id']);
                	$("#soal_id").val(data.soal['soal_id']);
                	$("#soal-teks").html(data.soal['soal_teks']);
                	$("#no-soal").html("NOMOR : "+data.n_new);
                	$("#jawaban").html("JAWABAN : "+data.soal.pj_jawaban);
                	setJawaban(data.soal.pj_jawaban, data.soal.pj_ragu);
                	setLembarJawab(data.n_new, data.soal.pj_ragu);

                	if(data.n_new == 1) {
                        $("#butFirst").addClass("d-none");
                        $("#butPrev").addClass("d-none");
                        $("#butNext").removeClass("d-none");
                        $("#butLast").removeClass("d-none");
                        $("#butSelesai").addClass("d-none");
                    } else if(data.n_new == data.jum_soal) {
                        $("#butFirst").removeClass("d-none");
                        $("#butPrev").removeClass("d-none");
                        $("#butNext").addClass("d-none");
                        $("#butLast").addClass("d-none");
                        $("#butSelesai").removeClass("d-none");
                    } else {
                        $("#butFirst").removeClass("d-none");
                        $("#butPrev").removeClass("d-none");
                        $("#butNext").removeClass("d-none");
                        $("#butLast").removeClass("d-none");
                        $("#butSelesai").addClass("d-none");
                    }

                }
            });
            return false;
        });

	  });
	</script>

	
</body>
</html>
