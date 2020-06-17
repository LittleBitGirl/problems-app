<?php


class Task extends Model {

	protected $_table_name = 'tasks';
	protected $_order_by = 'created_at';


    public function getAllTasks($page, $sort = 'created_at', $order = 'ASC')
	{
		$page  = (isset($page) && $page < 100000)? (int) $page : 1;
		$perPage = 3;
		$start = $perPage * ($page - 1);
		$total = R::count('tasks');
		$totalPages = ceil($total / $perPage);

		$next = $page+1;
		$prev = $page-1;

		$result = R::findAll('tasks', ' ORDER BY '. $sort .' '.$order.' LIMIT '.$start.', '.$perPage);
		$paginatoinInfo = [
			"page"          => $page,
			"start"         => $start,
			"totalPages"    => $totalPages,
			"next"          => $next,
			"prev"          => $prev
		];

		$res = [];
		$res['tasks'] = (count($result) > 0) ? $result : false;
		$res['paginator'] = $paginatoinInfo;
		return $res;
	}
}