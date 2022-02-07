<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
		<li class="nav-item">
			<a class="nav-link" href="index.html">
				<i class="ti-shield menu-icon"></i>
				<span class="menu-title">Dashboard</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="collapse" href="#type" aria-expanded="false" aria-controls="ui-basic">
				<i class="ti-palette menu-icon"></i>
				<span class="menu-title">Ribbon Type</span>
				<i class="menu-arrow"></i>
			</a>
			<div class="collapse" id="type">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>index.php/dashboard/ribbonType">Add</a></li>
					<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>index.php/dashboard/ribbonTypeList">List</a></li>
				</ul>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="collapse" href="#branch" aria-expanded="false" aria-controls="ui-basic">
				<i class="ti-palette menu-icon"></i>
				<span class="menu-title">Ribbon Branch</span>
				<i class="menu-arrow"></i>
			</a>
			<div class="collapse" id="branch">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>index.php/branch/">Add</a></li>
					<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>index.php/branch/ribbonBranchList">List</a></li>
				</ul>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="collapse" href="#attachment" aria-expanded="false" aria-controls="ui-basic">
				<i class="ti-palette menu-icon"></i>
				<span class="menu-title">Ribbon Attachments</span>
				<i class="menu-arrow"></i>
			</a>
			<div class="collapse" id="attachment">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>index.php/attachment/">Add</a></li>
					<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>index.php/attachment/ribbonAttachmentsList">List</a></li>
				</ul>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="collapse" href="#ribbon" aria-expanded="false" aria-controls="ribbon">
				<i class="ti-palette menu-icon"></i>
				<span class="menu-title">Ribbon</span>
				<i class="menu-arrow"></i>
			</a>
			<div class="collapse" id="ribbon">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>index.php/ribbon/">Add</a></li>
					<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>index.php/ribbon/ribbonType">List</a></li>
				</ul>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="documentation/documentation.html">
				<i class="ti-write menu-icon"></i>
				<span class="menu-title">Documentation</span>
			</a>
		</li>
	</ul>
</nav>
