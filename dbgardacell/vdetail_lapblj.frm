TYPE=VIEW
query=(select `vlapblj_user`.`lapid` AS `lapid`,`vlapblj_user`.`uid` AS `uid`,`vlapblj_user`.`rid` AS `rid`,`vlapblj_user`.`unama` AS `unama`,`vlapblj_user`.`nama` AS `nama`,`vlapblj_user`.`email` AS `email`,`vlapblj_user`.`konama` AS `konama`,`vlapblj_user`.`alamat` AS `alamat`,`vlapblj_user`.`phone` AS `phone`,`vlapblj_user`.`lapip` AS `lapip`,`vrekap_krblj`.`krqty` AS `krqty`,`vrekap_krblj`.`krsbtotal` AS `krsbtotal`,`vlapblj_user`.`lapdate` AS `lapdate`,`vlapblj_user`.`laptime` AS `laptime`,`vlapblj_user`.`lapstatus` AS `lapstatus`,`vlapblj_user`.`koongkos` AS `koongkos` from (`dbgardacell`.`vlapblj_user` join `dbgardacell`.`vrekap_krblj` on(((`vlapblj_user`.`lapid` = `vrekap_krblj`.`lapid`) and (`vlapblj_user`.`uid` = `vrekap_krblj`.`uid`)))))
md5=431f20ada3f46e53a6b9f55b02b0d625
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2014-04-13 04:12:51
create-version=1
source=(\nSELECT     vlapblj_user.lapid, vlapblj_user.uid, vlapblj_user.rid, vlapblj_user.unama, vlapblj_user.nama, vlapblj_user.email, vlapblj_user.konama, \n                      vlapblj_user.alamat, vlapblj_user.phone, vlapblj_user.lapip, vrekap_krblj.krqty, vrekap_krblj.krsbtotal, vlapblj_user.lapdate, \n                      vlapblj_user.laptime, vlapblj_user.lapstatus, vlapblj_user.koongkos\nFROM         vlapblj_user INNER JOIN\n                      vrekap_krblj ON vlapblj_user.lapid = vrekap_krblj.lapid AND vlapblj_user.uid = vrekap_krblj.uid\n)
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=(select `vlapblj_user`.`lapid` AS `lapid`,`vlapblj_user`.`uid` AS `uid`,`vlapblj_user`.`rid` AS `rid`,`vlapblj_user`.`unama` AS `unama`,`vlapblj_user`.`nama` AS `nama`,`vlapblj_user`.`email` AS `email`,`vlapblj_user`.`konama` AS `konama`,`vlapblj_user`.`alamat` AS `alamat`,`vlapblj_user`.`phone` AS `phone`,`vlapblj_user`.`lapip` AS `lapip`,`vrekap_krblj`.`krqty` AS `krqty`,`vrekap_krblj`.`krsbtotal` AS `krsbtotal`,`vlapblj_user`.`lapdate` AS `lapdate`,`vlapblj_user`.`laptime` AS `laptime`,`vlapblj_user`.`lapstatus` AS `lapstatus`,`vlapblj_user`.`koongkos` AS `koongkos` from (`dbgardacell`.`vlapblj_user` join `dbgardacell`.`vrekap_krblj` on(((`vlapblj_user`.`lapid` = `vrekap_krblj`.`lapid`) and (`vlapblj_user`.`uid` = `vrekap_krblj`.`uid`)))))
