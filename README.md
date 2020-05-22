# ecommerce

API :
1) http://localhost/ecommerce/reimbursement/api/reimbursement/create.php
method :- POST
provide data as form data in postman
Response :- {"msg":"Data added successfully. ","id":3}

2)http://localhost/ecommerce/reimbursement/api/reimbursement/getbyid.php?id=3
method : GET
Response : [{"id":"3","type":"conveyance","select_month":"2","select_year":"2020","from":"2020-02-01 11:00:00","to":"2020-02-01 18:00:00","purpose":"other","other_pupose":"sdasdasda","mode":"other","other_mode":"dasdasda","km":"10.80","inv_no":"sasdas12","amt":"1200.0000","attachhment_path":"587421fd7f10976cb80bc4d3fba97b6f.pdf"}]

3) http://localhost/ecommerce/reimbursement/api/reimbursement/getbydate.php?date=2020-02-01
method :- GET
Response :- [{"id":"1","type":"conveyance","select_month":"2","select_year":"2020","from":"2020-02-01 11:00:00","to":"2020-02-01 18:00:00","purpose":"other","other_pupose":"sdasdasda","mode":"other","other_mode":"dasdasda","km":"10.80","inv_no":"sasdas12","amt":"1200.0000","attachhment_path":"ecommerce/reimbursement/upload_file/e43ee205ad0591bf951b58d06db7bb6e.pdf"},{"id":"2","type":"conveyance","select_month":"2","select_year":"2020","from":"2020-02-01 11:00:00","to":"2020-02-01 18:00:00","purpose":"other","other_pupose":"sdasdasda","mode":"other","other_mode":"dasdasda","km":"10.80","inv_no":"sasdas12","amt":"1200.0000","attachhment_path":"ecommerce/reimbursement/upload_file/ef510bd26ffdff22c3d9de28db185336.pdf"},{"id":"3","type":"conveyance","select_month":"2","select_year":"2020","from":"2020-02-01 11:00:00","to":"2020-02-01 18:00:00","purpose":"other","other_pupose":"sdasdasda","mode":"other","other_mode":"dasdasda","km":"10.80","inv_no":"sasdas12","amt":"1200.0000","attachhment_path":"ecommerce/reimbursement/upload_file/587421fd7f10976cb80bc4d3fba97b6f.pdf"}]