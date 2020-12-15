create table book_report (
   num int not null auto_increment,
   id char(15) not null,
   name char(10) not null,
   subject char(200) not null,
   author char(20) not null,
   publisher char(20) not null,
   genre char(10) not null,
   content text not null,        
   regist_day char(20) not null,
   favorite char(5),
   public char (5),
   primary key(num)
);

