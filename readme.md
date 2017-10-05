									SESSİON_START İŞLEMLERİ
START:   (new session())->start("ogrenci_id",5);
KOŞUL: 	 (new session())->kosul("ogrenci_id"); //bu isimde session aktifmi diye bakar
END:     (new session())->end();


_______________________________________________________________________________________________________________________________________________________

									   DATABASE İSLEMLERİ

İNSERT: (new mymodel())->insert(array("mail" =>$this->mail,"parola" =>$this->parola,"okulno" =>$this->okulno, ));
SELECT: (new mymodel())->where("ogrenci_id", 6)->select();
UPDATE:   $a=(new users())->update(array("ogrenci_id",9,2)); // idsi 9 olanı 2 yapar


________________________________________________________________________________________________________________________________________________________


										SİMPLE FARCtory PATTERN

$ako=factory::load("ako");
echo $ako->ako();
şeklinde kullanılır. Eğer yanlış namespace kullanılırsa yardım olarak diziznde ki namespaceleri gösterir.
________________________________________________________________________________________________________________________________________________________


