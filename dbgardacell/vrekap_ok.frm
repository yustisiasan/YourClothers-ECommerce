TYPE=VIEW
query=(select `vdetail_lapblj`.`lapid` AS `lapid`,`vdetail_lapblj`.`uid` AS `uid`,`vdetail_lapblj`.`rid` AS `rid`,`vdetail_lapblj`.`unama` AS `unama`,`vdetail_lapblj`.`nama` AS `nama`,`vdetail_lapblj`.`email` AS `email`,`vdetail_lapblj`.`konama` AS `konama`,`vdetail_lapblj`.`alamat` AS `alamat`,`vdetail_lapblj`.`phone` AS `phone`,`vdetail_lapblj`.`lapip` AS `lapip`,`vdetail_lapblj`.`krqty` AS `krqty`,`vdetail_lapblj`.`krsbtotal` AS `krsbtotal`,`vdetail_lapblj`.`lapdate` AS `lapdate`,`vdetail_lapblj`.`laptime` AS `laptime`,`vdetail_lapblj`.`lapstatus` AS `lapstatus`,`vdetail_lapblj`.`koongkos` AS `koongkos`,(`vdetail_lapblj`.`krsbtotal` + `vdetail_lapblj`.`koongkos`) AS `total` from `dbgardacell`.`vdetail_lapblj` where (`vdetail_lapblj`.`lapstatus` = \'OK\'))
md5=59ef6da2e5ca029ba18ad64afff9bc92
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2014-04-15 00:08:43
create-version=1
source=(\n  SELECT lapid, uid, rid, unama, nama,email, konama, alamat, phone,\n         lapip, krqty, krsbtotal, lapdate, laptime, lapstatus, koongkos,\n         (krsbtotal+koongkos) as total\n  FROM vdetail_lapblj\n  WHERE lapstatus=\'OK\'\n)
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=(select `vdetail_lapblj`.`lapid` AS `lapid`,`vdetail_lapblj`.`uid` AS `uid`,`vdetail_lapblj`.`rid` AS `rid`,`vdetail_lapblj`.`unama` AS `unama`,`vdetail_lapblj`.`nama` AS `nama`,`vdetail_lapblj`.`email` AS `email`,`vdetail_lapblj`.`konama` AS `konama`,`vdetail_lapblj`.`alamat` AS `alamat`,`vdetail_lapblj`.`phone` AS `phone`,`vdetail_lapblj`.`lapip` AS `lapip`,`vdetail_lapblj`.`krqty` AS `krqty`,`vdetail_lapblj`.`krsbtotal` AS `krsbtotal`,`vdetail_lapblj`.`lapdate` AS `lapdate`,`vdetail_lapblj`.`laptime` AS `laptime`,`vdetail_lapblj`.`lapstatus` AS `lapstatus`,`vdetail_lapblj`.`koongkos` AS `koongkos`,(`vdetail_lapblj`.`krsbtotal` + `vdetail_lapblj`.`koongkos`) AS `total` from `dbgardacell`.`vdetail_lapblj` where (`vdetail_lapblj`.`lapstatus` = \'OK\'))
