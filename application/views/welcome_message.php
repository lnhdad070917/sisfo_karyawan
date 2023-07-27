<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Dashboard</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-lg-2 col-6">
					<div class="small-box text-center bg-info ">
						<div class="inner">
							<h3>
								<?= $gradeS ?>
							</h3>
							<p>karyawan <br /> grade S</p>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-6">
					<div class="small-box text-center bg-success">
						<div class="inner">
							<h3>
								<?= $gradeA ?>
							</h3>
							<p>karyawan <br /> grade A</p>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-6">
					<div class="small-box text-center bg-warning">
						<div class="inner">
							<h3>
								<?= $gradeB ?>
							</h3>
							<p>karyawan <br /> grade B</p>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-6">
					<div class="small-box text-center bg-orange">
						<div class="inner">
							<h3>
								<?= $gradeC ?>
							</h3>
							<p>karyawan <br /> grade C</p>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-6">
					<div class="small-box text-center bg-danger">
						<div class="inner">
							<h3>
								<?= $gradeD ?>
							</h3>
							<p>karyawan <br /> grade D</p>
						</div>
					</div>
				</div>
			</div>
			<form action="#" method="post" style="width:100%" class="row text-center">
				<div class="col-lg-4 col-6">
					<label for="tahun">Tahun</label>
					<select name="tahun" id="tahunFilter" class="form-control">
						<option value="">Semua</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
					</select>
				</div>
				<div class="col-lg-4 col-6">
					<label for="grade">Grade</label>
					<div class="row justify-content-center">
						<div class="p-2">
							<input type="checkbox" name="grade[]" class="gradeFilter" value="S">
							<label for="s">S</label>
						</div>
						<div class="p-2">
							<input type="checkbox" name="grade[]" class="gradeFilter" value="A">
							<label for="a">A</label>
						</div>
						<div class="p-2">
							<input type="checkbox" name="grade[]" class="gradeFilter" value="B">
							<label for="b">B</label>
						</div>
						<div class="p-2">
							<input type="checkbox" name="grade[]" class="gradeFilter" value="C">
							<label for="c">C</label>
						</div>
						<div class="p-2">
							<input type="checkbox" name="grade[]" class="gradeFilter" value="D">
							<label for="d">D</label>
						</div>
					</div>
				</div>
			</form>
			<div class="row justify-content-center">
				<div class="container">
					<table id="karyawan" class="w-100 table table-striped">
						<thead>
							<tr>
								<th>NIK</th>
								<th>Nama</th>
								<th>Tahun</th>
								<th>Status</th>
								<th>Nilai</th>
								<th>Grade</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($Karyawan as $k) { ?>
								<tr>
									<td>
										<?= $k->nik ?>
									</td>
									<td>
										<?= $k->nama ?>
									</td>
									<td>
										<?= $k->tahun ?>
									</td>
									<td>
										<?= $k->status ?>
									</td>
									<td>
										<?= $k->nilai ?>
									</td>
									<td>
										<?= $k->grade ?>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<script>
						$(document).ready(function () {
							var table = $("#karyawan").DataTable();

							$(".gradeFilter").on("change", function () {
								var selectedGrades = [];
								$(".gradeFilter:checked").each(function () {
									selectedGrades.push($(this).val());
								});
								var gradeSearch = selectedGrades.join("|");
								table.column(5).search(gradeSearch, true, false).draw();
							});

							$("#tahunFilter").on("change", function () {
								var tahun = this.value;
								table.column(2).search(tahun).draw();
							});
						});
					</script>
				</div>
			</div>
		</div>
	</section>
</div>