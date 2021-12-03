<?php 
function chart(){

    if($_SESSION['user']['permission'] == 0){
        $sql = "SELECT categorys.id_cate as iddm, categorys.name_cate as namedm, count(products.id) as slsp,
        min(products.price) as minprice, max(products.price) as maxprice, avg(products.price) as avgsp
        FROM products left join categorys on categorys.id_cate=products.category 
        group by categorys.id_cate order by categorys.id_cate desc";
        $chart_pr = executeQuery($sql);
        admin_render('statistical/chart.php',[
            'chart_pr' => $chart_pr
        ]);
    }else if($_SESSION['user']['permission'] == 1){
        $sql = "SELECT categorys.id_cate as iddm, categorys.name_cate as namedm, count(products.id) as slsp,
        min(products.price) as minprice, max(products.price) as maxprice, avg(products.price) as avgsp
        FROM products left join categorys on categorys.id_cate=products.category where products.cp_ctv='".$_SESSION['user']['id']."'
        group by categorys.id_cate order by categorys.id_cate desc ";
        $chart_pr = executeQuery($sql);
        admin_render('statistical/chart.php',[
            'chart_pr' => $chart_pr
        ]);
    }
}
?>