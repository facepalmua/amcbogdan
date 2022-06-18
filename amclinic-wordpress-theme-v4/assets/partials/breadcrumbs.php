<?php if($breadcrumbs){
	$b_amount = count($breadcrumbs);
?>
<div class="breadcrumbs">
	<nav role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb">
		<ul class="trail-items" itemscope="" itemtype="http://schema.org/BreadcrumbList">
			<meta name="numberOfItems" content="<?php echo $b_amount?>">
			<meta name="itemListOrder" content="Ascending">

			<?php
			$_count = count($breadcrumbs);
			$b_count = 0;
			foreach($breadcrumbs as $crumb){
				$b_count++;
				$class = ($b_count == 1) ? 'trail-begin' : null;
				$class = ($_count == $b_amount) ? 'trail-end' : $class;
			?>
					<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="trail-item <?php echo $class ?>">
						<a href="<?php echo $crumb['href']?>">
							<span itemprop="name"><?php echo strtolower($crumb['title'])?></span>
						</a>
						<meta itemprop="position" content="<?php echo $b_count ?>">
					</li>
			<?php
			}
			?>
		</ul>
	</nav>
</div>
<?php } ?>