TYPE=VIEW
query=(select `dbgardacell`.`lapbelanja`.`lapid` AS `lapid`,`dbgardacell`.`lapbelanja`.`uid` AS `uid`,`dbgardacell`.`users`.`rid` AS `rid`,`dbgardacell`.`users`.`unama` AS `unama`,`dbgardacell`.`users`.`nama` AS `nama`,`dbgardacell`.`users`.`email` AS `email`,`dbgardacell`.`lapbelanja`.`konama` AS `konama`,`dbgardacell`.`lapbelanja`.`alamat` AS `alamat`,`dbgardacell`.`users`.`phone` AS `phone`,`dbgardacell`.`lapbelanja`.`lapip` AS `lapip`,`dbgardacell`.`lapbelanja`.`lapdate` AS `lapdate`,`dbgardacell`.`lapbelanja`.`laptime` AS `laptime`,`dbgardacell`.`lapbelanja`.`lapstatus` AS `lapstatus`,`dbgardacell`.`kota`.`koongkos` AS `koongkos` from ((`dbgardacell`.`lapbelanja` join `dbgardacell`.`users` on((`dbgardacell`.`lapbelanja`.`uid` = `dbgardacell`.`users`.`uid`))) join `dbgardacell`.`kota` on((`dbgardacell`.`lapbelanja`.`konama` = `dbgardacell`.`kota`.`konama`))))
md5=34041e0dd329fc4ff877488d142bcaab
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2014-04-13 04:11:41
create-version=1
source=(\nSELECT     lapbelanja.lapid, lapbelanja.uid, users.rid, users.unama, users.nama, users.email, lapbelanja.konama, lapbelanja.alamat, \n                      users.phone, lapbelanja.lapip, lapbelanja.lapdate, lapbelanja.laptime, lapbelanja.lapstatus, kota.koongkos\nFROM         lapbelanja INNER JOIN\n                      users ON lapbelanja.uid = users.uid INNER JOIN\n                      kota ON lapbelanja.konama = kota.konama\n)
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=(select `dbgardacell`.`lapbelanja`.`lapid` AS `lapid`,`dbgardacell`.`lapbelanja`.`uid` AS `uid`,`dbgardacell`.`users`.`rid` AS `rid`,`dbgardacell`.`users`.`unama` AS `unama`,`dbgardacell`.`users`.`nama` AS `nama`,`dbgardacell`.`users`.`email` AS `email`,`dbgardacell`.`lapbelanja`.`konama` AS `konama`,`dbgardacell`.`lapbelanja`.`alamat` AS `alamat`,`dbgardacell`.`users`.`phone` AS `phone`,`dbgardacell`.`lapbelanja`.`lapip` AS `lapip`,`dbgardacell`.`lapbelanja`.`lapdate` AS `lapdate`,`dbgardacell`.`lapbelanja`.`laptime` AS `laptime`,`dbgardacell`.`lapbelanja`.`lapstatus` AS `lapstatus`,`dbgardacell`.`kota`.`koongkos` AS `koongkos` from ((`dbgardacell`.`lapbelanja` join `dbgardacell`.`users` on((`dbgardacell`.`lapbelanja`.`uid` = `dbgardacell`.`users`.`uid`))) join `dbgardacell`.`kota` on((`dbgardacell`.`lapbelanja`.`konama` = `dbgardacell`.`kota`.`konama`))))
