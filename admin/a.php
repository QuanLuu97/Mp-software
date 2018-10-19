<?php
$str = "Chuỗi bạn cần cắt, nội dung tin tức chẳng hạn."; //Tạo chuỗi
$str = strip_tags($str); //Lược bỏ các tags HTML
if(strlen($str)>10) { //Đếm kí tự chuỗi $str, 100 ở đây là chiều dài bạn cần quy định
$strCut = substr($str, 0, 10); //Cắt 100 kí tự đầu
$str = substr($strCut, 0, strrpos($strCut, ' ')).'... <a href="Link cần dẫn">Read More</a>'; //Tránh trường hợp cắt dang dở như "nội d... Read More"
}
echo $str;
?>