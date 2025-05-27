ALTER TABLE `pos`
ADD `siswa` int(11) NULL AFTER `buku_id`,
ADD FOREIGN KEY (`siswa`) REFERENCES `siswa` (`id`) ON DELETE NO ACTION;


ALTER TABLE `pos`
ADD `tgl_pinjam` date NOT NULL AFTER `type`;


ALTER TABLE `pos`
ADD `note` text NULL;

ALTER TABLE `pos`
DROP FOREIGN KEY `pos_ibfk_3`,
ADD FOREIGN KEY (`siswa`) REFERENCES `siswa` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT

ALTER TABLE `pos`
ADD `tgl_kembali` date NOT NULL AFTER `tgl_pinjam`;

ALTER TABLE `pos`
CHANGE `type` `type` enum('OUT','IN','BACK') COLLATE 'latin1_swedish_ci' NULL AFTER `qty`;