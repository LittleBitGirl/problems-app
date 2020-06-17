<?php defined('__ROOT__') OR exit('403 forbidden');
if (isset($_GET["page"])) {
	$currentPage = $_GET["page"];
} else {
	$currentPage = 1;
};
$sortVars = [
        'email' => 'E-mail',
        'user_name' => 'User Name',
        'done' => 'Status'
];
if (isset( $_GET["sort"])){
    $sort = $_GET["sort"];
} else {
    $sort = 'user_name';
}
?>
<nav aria-label="..." class="tasks-pagination">
    <ul class="pagination pagination-lg">
        <?php foreach ($sortVars as $sortVar => $sortValue) { ?>
        <li class="page-item <?php if($sortVar == $_GET['sort']) echo 'disabled'?>">
            <a class="page-link" href="<?php echo '?sort='. $sortVar .'&page='. ($_GET['page'] ?? 1) ?>"
               tabindex="-1"><?php echo $sortValue ?></a>
        </li>
        <?php } ?>
        <li class="page-item <?php if($_GET['order'] == 'DESC') echo 'disabled'?>">
            <a class="page-link" href="<?php echo '?sort='. ($_GET['sort'] ?? 'created_at') .'&page='. ($_GET['page'] ?? 1).'&order=DESC' ?>"
               tabindex="-1"><b> &#9660;</b></a>
        </li>
        <li class="page-item <?php if($_GET['order'] == 'ASC' || !isset($_GET['order'])) echo 'disabled'?>">
            <a class="page-link" href="<?php echo '?sort='. ($_GET['sort'] ?? 'created_at') .'&page='. ($_GET['page'] ?? 1).'&order=ASC' ?>"
               tabindex="-1"><b>&#9650;</b></a>
        </li>
    </ul>
</nav>
<div class="row tasks-list center-block">
	<?php
	foreach ($this->data['tasks'] as $task) {
		include('card.php');
	}
	?>
</div>
<nav aria-label="..." class="tasks-pagination">
    <ul class="pagination pagination-lg">
		<?php
        $pagination = $this->data['paginator'];
		for ($page = 1;
			 $page <= $pagination['totalPages'];
			 $page++) { ?>
            <li class="page-item <?php if($page == $_GET['page']) echo 'disabled'?>">
                <a class="page-link" href="<?php echo '?page=' . $page .'&sort='. ($_GET['sort'] ?? 'created_at').'&order='. ($_GET['order'] ?? 'ASC')?>"
                   tabindex="-1"><?php echo $page ?></a>
            </li>
		<?php } ?>
    </ul>
</nav>