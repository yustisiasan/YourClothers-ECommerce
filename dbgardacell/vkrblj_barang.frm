TYPE=VIEW
query=(select `dbgardacell`.`krbelanja`.`krid` AS `krid`,`dbgardacell`.`krbelanja`.`bid` AS `bid`,`dbgardacell`.`barang`.`bnama` AS `bnama`,`dbgardacell`.`barang`.`bharga` AS `bharga`,`dbgardacell`.`barang`.`bimg` AS `bimg`,`dbgardacell`.`barang`.`bgaransi` AS `bgaransi`,`dbgardacell`.`krbelanja`.`krqty` AS `krqty`,`dbgardacell`.`krbelanja`.`krsbtotal` AS `krsbtotal`,`dbgardacell`.`krbelanja`.`krip` AS `krip`,`dbgardacell`.`krbelanja`.`krstatus` AS `krstatus`,`dbgardacell`.`krbelanja`.`lapid` AS `lapid`,`dbgardacell`.`krbelanja`.`uid` AS `uid` from (`dbgardacell`.`krbelanja` join `dbgardacell`.`barang` on((`dbgardacell`.`krbelanja`.`bid` = `dbgardacell`.`barang`.`bid`))))
md5=00f13dfa68c0feea16ad1f64e378e62b
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2014-04-13 04:12:51
create-version=1
source=(\nSELECT     krbelanja.krid, krbelanja.bid, barang.bnama, barang.bharga, barang.bimg, barang.bgaransi, krbelanja.krqty, krbelanja.krsbtotal, \n                      krbelanja.krip, krbelanja.krstatus, krbelanja.lapid, krbelanja.uid\nFROM         krbelanja INNER JOIN\n                      barang ON krbelanja.bid = barang.bid\n)
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=(select `dbgardacell`.`krbelanja`.`krid` AS `krid`,`dbgardacell`.`krbelanja`.`bid` AS `bid`,`dbgardacell`.`barang`.`bnama` AS `bnama`,`dbgardacell`.`barang`.`bharga` AS `bharga`,`dbgardacell`.`barang`.`bimg` AS `bimg`,`dbgardacell`.`barang`.`bgaransi` AS `bgaransi`,`dbgardacell`.`krbelanja`.`krqty` AS `krqty`,`dbgardacell`.`krbelanja`.`krsbtotal` AS `krsbtotal`,`dbgardacell`.`krbelanja`.`krip` AS `krip`,`dbgardacell`.`krbelanja`.`krstatus` AS `krstatus`,`dbgardacell`.`krbelanja`.`lapid` AS `lapid`,`dbgardacell`.`krbelanja`.`uid` AS `uid` from (`dbgardacell`.`krbelanja` join `dbgardacell`.`barang` on((`dbgardacell`.`krbelanja`.`bid` = `dbgardacell`.`barang`.`bid`))))
