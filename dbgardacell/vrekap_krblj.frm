TYPE=VIEW
query=(select ifnull(sum(`dbgardacell`.`krbelanja`.`krqty`),0) AS `krqty`,ifnull(sum(`dbgardacell`.`krbelanja`.`krsbtotal`),0) AS `krsbtotal`,`dbgardacell`.`krbelanja`.`lapid` AS `lapid`,`dbgardacell`.`krbelanja`.`uid` AS `uid` from `dbgardacell`.`krbelanja` group by `dbgardacell`.`krbelanja`.`lapid`,`dbgardacell`.`krbelanja`.`uid`)
md5=365684d18b0c0c9b19e4c87b9ffe17de
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2014-04-13 04:12:31
create-version=1
source=(\nSELECT     IFNULL(SUM(krqty), 0) AS krqty, IFNULL(SUM(krsbtotal), 0) AS krsbtotal, lapid, uid\nFROM         krbelanja\nGROUP BY lapid, uid\n)
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=(select ifnull(sum(`dbgardacell`.`krbelanja`.`krqty`),0) AS `krqty`,ifnull(sum(`dbgardacell`.`krbelanja`.`krsbtotal`),0) AS `krsbtotal`,`dbgardacell`.`krbelanja`.`lapid` AS `lapid`,`dbgardacell`.`krbelanja`.`uid` AS `uid` from `dbgardacell`.`krbelanja` group by `dbgardacell`.`krbelanja`.`lapid`,`dbgardacell`.`krbelanja`.`uid`)
