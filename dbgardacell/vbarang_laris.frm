TYPE=VIEW
query=(select `vkrblj_barang`.`bid` AS `bid`,`vkrblj_barang`.`bnama` AS `bnama`,`vkrblj_barang`.`bimg` AS `bimg`,sum(`vkrblj_barang`.`krqty`) AS `krqty` from `dbgardacell`.`vkrblj_barang` where `vkrblj_barang`.`lapid` in (select `dbgardacell`.`lapbelanja`.`lapid` from `dbgardacell`.`lapbelanja` where (`dbgardacell`.`lapbelanja`.`lapstatus` = \'OK\')) group by `vkrblj_barang`.`bid`,`vkrblj_barang`.`bnama`,`vkrblj_barang`.`bimg`)
md5=bba14ff2dc532f0839c8aecccc188676
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2014-04-15 00:08:43
create-version=1
source=(\nSELECT bid, bnama, bimg, SUM(krqty) as krqty\nFROM vkrblj_barang\nWHERE lapid IN (SELECT lapid FROM lapbelanja WHERE lapstatus=\'OK\')\nGROUP BY bid, bnama, bimg\n)
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=(select `vkrblj_barang`.`bid` AS `bid`,`vkrblj_barang`.`bnama` AS `bnama`,`vkrblj_barang`.`bimg` AS `bimg`,sum(`vkrblj_barang`.`krqty`) AS `krqty` from `dbgardacell`.`vkrblj_barang` where `vkrblj_barang`.`lapid` in (select `dbgardacell`.`lapbelanja`.`lapid` from `dbgardacell`.`lapbelanja` where (`dbgardacell`.`lapbelanja`.`lapstatus` = \'OK\')) group by `vkrblj_barang`.`bid`,`vkrblj_barang`.`bnama`,`vkrblj_barang`.`bimg`)
