<style type="text/css">
.jquerycssmenu {
	padding: 3px 0 0 10px;
}
.jquerycssmenu ul {
	margin: 0;
	padding: 0;
	list-style-type: none;
}
.jquerycssmenu ul li {
	position: relative;
	display: inline;
	float: left;
}
.jquerycssmenu ul li a {
	display: block;
	padding: 5px 7px 6px 7px;
	margin-right: 3px;
	color: #fff;
	text-decoration: none;
}
.jquerycssmenu ul li a:hover {
	color: #f2cb16;
	/* background-image: url('./themes/images/hm_h.png'); */
}
.jquerycssmenu ul li ul {
	position: absolute;
	left: 0;
	display: block;
	visibility: hidden;
	border-bottom: 1px solid #315091;
	border-top: 1px solid #315091;
}
.jquerycssmenu ul li ul li {
	display: list-item;
	float: none;
}
.jquerycssmenu ul li ul li ul {
	top: 0;
}
.jquerycssmenu ul li ul li a {
	width: 160px;
	background: white;
	color: black;
	padding: 2px 2px 0 10px;
	margin: 0;
	border-top-width: 0;
	border-top: 1px solid #eee;
}
.jquerycssmenu ul li ul li a:hover {
	background: #b72c24;
	color: #fff;
}
.downarrowclass {
	position: absolute;
	top: 11px;
	right: 10px;
}
.rightarrowclass {
	position: absolute;
	top: 8px;
	right: 5px;
}
*:first-child+html .jquerycssmenu {
	height: 1%;
}
* html .jquerycssmenu{
	height: 1%;
}
* html .jquerycssmenu ul li ul li a {
	display: inline-block;
}
</style>
<?php
function get_menu($data, $parent = 0) {
	static $i = 1;
	$tab = str_repeat("\t\t", $i);
	if (!empty($data[$parent])) {
		$html = "\n$tab<ul>";
		$i++;
		foreach ($data[$parent] as $v) {
			$child = get_menu($data, $v->mid);
			$html .= "\n\t$tab<li>";
			$html .= '<a href="./?n=main&mp='.$parent.$v->murl.'">'.$v->mtitel.'</a>';
			if ($child) {
				$i--;
				$html .= $child;
				$html .= "\n\t$tab";
			}
			$html .= '</li>';
		}
		$html .= "\n$tab</ul>";
		return $html;
	} else {
		return false;
	}
}
$result = mysql_query("SELECT * FROM menu WHERE mclass='h' ORDER BY parent_id, morder", $dbconn);
while ($row = mysql_fetch_object($result)) {
	$data[$row->parent_id][] = $row;
}
$menu = get_menu($data);

if (isset($_SESSION['logg3dAdm1n']) AND $_SESSION['role']==1){
?>
<div id="myjquerymenu" class="jquerycssmenu">
<?php echo $menu; ?>
</div>
<?php
}
?>