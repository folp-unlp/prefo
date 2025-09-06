<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $this->report_title; ?></title>
	<style>
		@page {
			margin: 0px;
			font-family: Arial, Helvetica, sans-serif;
		}

		body,
		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			margin: 0px;
			padding: 0px;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 0.8rem;
		}

		small {
			font-size: 12px;
			color: #888;
		}

		.ajax-page-load-indicator {
			display: none;
			visibility: hidden;
		}

		#report-header {
			position: relative;
			padding: 20px 20px 0;
		}

		#report-header table {
			margin: 0;
		}

		#report-header .sub-title {
			font-size: small;
			color: #888;
		}

		#report-header img {
			height: 50px;
		}

		#report-title {
			padding: 20px 0 0 22px;
			font-size: 16px;
		}

		#report-body {
			padding: 20px;
		}

		#report-footer {
			padding: 20px;
			position: static;
			bottom: 0;
			left: 0;
			overflow: hidden;
			margin: 0 auto;
		}

		#report-footer table {
			margin: 0;
			overflow: hidden;
		}

		table,
		.table {
			width: 100%;
			max-width: 100%;
			margin-bottom: 1rem;
			border-collapse: collapse;
		}

		.table th,
		.table td {
			padding: 0.75rem;
		}

		.table thead th {
			text-align: left;
			vertical-align: bottom;
			border-bottom: 2px solid #eceeef;
		}

		.table tbody+tbody {
			border-top: 2px solid #eceeef;
		}

		.table .table {
			background-color: #fff;
		}

		.table-sm th,
		.table-sm td {
			padding: 0.3rem;
		}

		.table-bordered {
			border: 1px solid #eceeef;
		}

		.table-bordered th,
		.table-bordered td {
			border: 1px solid #eceeef;
		}

		.table-bordered thead th,
		.table-bordered thead td {
			border-bottom-width: 2px;
		}

		.table-striped tbody tr:nth-of-type(odd) {
			background-color: rgba(0, 0, 0, 0.05);
		}

		.table-hover tbody tr:hover {
			background-color: rgba(0, 0, 0, 0.075);
		}

		.table-active,
		.table-active>th,
		.table-active>td {
			background-color: rgba(0, 0, 0, 0.075);
		}

		.table-hover .table-active:hover {
			background-color: rgba(0, 0, 0, 0.075);
		}

		.table-hover .table-active:hover>td,
		.table-hover .table-active:hover>th {
			background-color: rgba(0, 0, 0, 0.075);
		}

		.table-success,
		.table-success>th,
		.table-success>td {
			background-color: #dff0d8;
		}

		.table-hover .table-success:hover {
			background-color: #d0e9c6;
		}

		.table-hover .table-success:hover>td,
		.table-hover .table-success:hover>th {
			background-color: #d0e9c6;
		}

		.table-info,
		.table-info>th,
		.table-info>td {
			background-color: #d9edf7;
		}

		.table-hover .table-info:hover {
			background-color: #c4e3f3;
		}

		.table-hover .table-info:hover>td,
		.table-hover .table-info:hover>th {
			background-color: #c4e3f3;
		}

		.table-warning,
		.table-warning>th,
		.table-warning>td {
			background-color: #fcf8e3;
		}

		.table-hover .table-warning:hover {
			background-color: #faf2cc;
		}

		.table-hover .table-warning:hover>td,
		.table-hover .table-warning:hover>th {
			background-color: #faf2cc;
		}

		.table-danger,
		.table-danger>th,
		.table-danger>td {
			background-color: #f2dede;
		}

		.table-hover .table-danger:hover {
			background-color: #ebcccc;
		}

		.table-hover .table-danger:hover>td,
		.table-hover .table-danger:hover>th {
			background-color: #ebcccc;
		}

		.thead-inverse th {
			color: #fff;
			background-color: #292b2c;
		}

		.thead-default th {
			color: #464a4c;
			background-color: #eceeef;
		}

		.table-inverse {
			color: #fff;
			background-color: #292b2c;
		}

		.table-inverse th,
		.table-inverse td,
		.table-inverse thead th {
			border-color: #fff;
		}

		.table-inverse.table-bordered {
			border: 0;
		}

		.table-responsive {
			display: block;
			width: 100%;
			overflow-x: auto;
			-ms-overflow-style: -ms-autohiding-scrollbar;
		}

		.table-responsive.table-bordered {
			border: 0;
		}
	</style>
</head>

<body>
    <div id="report-header">
        <table class="table table-responsive table-sm">
            <tr>
                <th><img src=<?php echo SITE_LOGO; ?> height="50"></th>
                <th align="left">
                    <h3 class="company-name"><?php echo SITE_NAME; ?></h3>
                    <small class="sub-title"><?php echo SITE_OWNER; ?></small>
                <th>
            </tr>
        </table>
    </div>

	<!-- <div id="report-title"><?php echo $this->report_title; ?></div> -->

    <div id="report-body">
		<?php
		header("Content-Type: text/html; charset=utf-8");
		$this->render_body();
		?>
	</div>

	<div id="report-footer">
		<table class="table table-sm">
			<tr>
				<td>
					<small class="sub-title"><?php echo SITE_NAME; ?> - <?php echo date('d-m-Y H:i') ?></small>
				</td>
			</tr>
		</table>
	</div>

	<?php
	if ($this->force_print) {
	?>
		<script>
			window.print();
		</script>
	<?php
	}
	?>
</body>

</html>