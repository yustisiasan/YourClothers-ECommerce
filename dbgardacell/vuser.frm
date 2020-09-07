TYPE=VIEW
query=(select `dbgardacell`.`users`.`uid` AS `uid`,`dbgardacell`.`users`.`unama` AS `unama`,`dbgardacell`.`users`.`upasswd` AS `upasswd`,`dbgardacell`.`users`.`nama` AS `nama`,`dbgardacell`.`users`.`email` AS `email`,`dbgardacell`.`users`.`alamat` AS `alamat`,`dbgardacell`.`users`.`phone` AS `phone`,`dbgardacell`.`users`.`uimg` AS `uimg`,`dbgardacell`.`users`.`konama` AS `konama`,`dbgardacell`.`users`.`rid` AS `rid`,`dbgardacell`.`roles`.`rnama` AS `rnama` from (`dbgardacell`.`users` join `dbgardacell`.`roles` on((`dbgardacell`.`users`.`rid` = `dbgardacell`.`roles`.`rid`))))
md5=cc77eca3ebfcf7943ffbb391b4b51d4c
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2014-04-13 04:11:41
create-version=1
source=(\nSELECT     users.uid, users.unama, users.upasswd, users.nama, users.email, users.alamat, users.phone, users.uimg, users.konama, \n                      users.rid, roles.rnama\nFROM         users INNER JOIN\n             roles ON users.rid = roles.rid\n)
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=(select `dbgardacell`.`users`.`uid` AS `uid`,`dbgardacell`.`users`.`unama` AS `unama`,`dbgardacell`.`users`.`upasswd` AS `upasswd`,`dbgardacell`.`users`.`nama` AS `nama`,`dbgardacell`.`users`.`email` AS `email`,`dbgardacell`.`users`.`alamat` AS `alamat`,`dbgardacell`.`users`.`phone` AS `phone`,`dbgardacell`.`users`.`uimg` AS `uimg`,`dbgardacell`.`users`.`konama` AS `konama`,`dbgardacell`.`users`.`rid` AS `rid`,`dbgardacell`.`roles`.`rnama` AS `rnama` from (`dbgardacell`.`users` join `dbgardacell`.`roles` on((`dbgardacell`.`users`.`rid` = `dbgardacell`.`roles`.`rid`))))
