<div class="col-xl-12">
	<div class="card">
		<div class="card-header">
			<h5>Switch button hide or show plagiarism</h5>
		</div>
		<div class="card-block">
			<!-- <label class="switch">
				<input type="checkbox" checked placeholder="publish">
				<span class="slider round"></span>
			</label> -->
			<div class="row">
				<div class="col-sm-12 col-xl-4 sub-title text-primary"># Profile</div>
				<div class="col-sm-12 col-xl-6 sub-title text-primary">Judul</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">Status</div>

				<!-- Data -->
				<div class="col-sm-12 col-xl-4 sub-title text-primary"># Profile</div>
				<div class="col-sm-12 col-xl-6 sub-title text-primary">Judul</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">Status</div>
			</div>
		</div>
	</div>
</div>

<style>
	.switch {
		position: relative;
		display: inline-block;
		width: 60px;
		height: 34px;
	}

	.switch input { 
		opacity: 0;
		width: 0;
		height: 0;
	}

	.slider {
		position: absolute;
		cursor: pointer;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #ccc;
		-webkit-transition: .4s;
		transition: .4s;
	}

	.slider:before {
		position: absolute;
		content: "";
		height: 26px;
		width: 26px;
		left: 4px;
		bottom: 4px;
		background-color: white;
		-webkit-transition: .4s;
		transition: .4s;
	}

	input:checked + .slider {
		background-color: #2196F3;
	}

	input:focus + .slider {
		box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
		-webkit-transform: translateX(26px);
		-ms-transform: translateX(26px);
		transform: translateX(26px);
	}

/* Rounded sliders */
.slider.round {
	border-radius: 34px;
}

.slider.round:before {
	border-radius: 50%;
}
</style>