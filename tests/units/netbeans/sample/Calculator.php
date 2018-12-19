<?php

    use netbeans\sample;

    namespace tests\units\netbeans\sample;

//require_once 'atoum.phar';

    use mageekguy\atoum;
    use vendor\project;

    class Calculator extends atoum\test {

        public function testTwoEndNodeRua() {
            $rua = array(
                0 => array('seq' => '1', 'way' => '27840851', 'node' => '305663900', 'lat' => -23.631996999999998, 'lon' => -46.688839199999997),
                1 => array('seq' => '2', 'way' => '27840851', 'node' => '305663905', 'lat' => -23.632595299999998, 'lon' => -46.688094300000003,),
                2 => array('seq' => '3', 'way' => '27840851', 'node' => '305663912', 'lat' => -23.6332418, 'lon' => -46.687275999999997),
            );

            $this
                    ->given($_singleNodes = new Gpb_Model_OSM_NodeSorter($rua))
                    ->then
                    ->array($nodes = $_singleNodes->getSingleNodes($rua))
                    ->sizeOf($nodes)->isEqualTo(2)
                    ->array($nodes[0])->isEqualTo($ruaSimples[0])
                    ->array(end($nodes))->isEqualTo(end($ruaSimples));
        }
        
        public function testRuaSeparadaAoMeio() {
            $rua = array(
                0 => array('seq' => '1', 'way' => '27796762', 'node' => '305196291', 'lat' => -23.623439099999999, 'lon' => -46.677493499999997),
                1 => array('seq' => '1', 'way' => '123814343', 'node' => '305196301', 'lat' => -23.623105899999999, 'lon' => -46.677463400000001),
                2 => array('seq' => '1', 'way' => '27840835', 'node' => '305197062', 'lat' => -23.6254271, 'lon' => -46.679622999999999),
                3 => array('seq' => '1', 'way' => '27796821', 'node' => '305197056', 'lat' => -23.628622400000001, 'lon' => -46.682599799999998),
                4 => array('seq' => '2', 'way' => '27796821', 'node' => '305197057', 'lat' => -23.6275996, 'lon' => -46.681576999999997),
                5 => array('seq' => '2', 'way' => '123814343', 'node' => '305196302', 'lat' => -23.622980500000001, 'lon' => -46.677363300000003),
                6 => array('seq' => '2', 'way' => '27840835', 'node' => '305197065', 'lat' => -23.624405400000001, 'lon' => -46.678596300000002),
                7 => array('seq' => '2', 'way' => '27796762', 'node' => '1379439736', 'lat' => -23.623224700000002, 'lon' => -46.6774901),
                8 => array('seq' => '3', 'way' => '123814343', 'node' => '305196248', 'lat' => -23.622764100000001, 'lon' => -46.677235500000002),
                9 => array('seq' => '3', 'way' => '27796762', 'node' => '305196301', 'lat' => -23.623105899999999, 'lon' => -46.677463400000001),
                10 => array('seq' => '3', 'way' => '27796821', 'node' => '305197058', 'lat' => -23.626538100000001, 'lon' => -46.6805831),
                11 => array('seq' => '3', 'way' => '27840835', 'node' => '297300377', 'lat' => -23.623557999999999, 'lon' => -46.677769400000003),
                12 => array('seq' => '4', 'way' => '123814343', 'node' => '305196295', 'lat' => -23.622333300000001, 'lon' => -46.676801699999999),
                13 => array('seq' => '4', 'way' => '27796821', 'node' => '305197062', 'lat' => -23.6254271, 'lon' => -46.679622999999999),
                14 => array('seq' => '5', 'way' => '123814343', 'node' => '305196296', 'lat' => -23.621497699999999, 'lon' => -46.6760169),
                15 => array('seq' => '6', 'way' => '123814343', 'node' => '305196288', 'lat' => -23.620712099999999, 'lon' => -46.6752805),
                16 => array('seq' => '7', 'way' => '123814343', 'node' => '305196289', 'lat' => -23.619915800000001, 'lon' => -46.674532499999998),
                17 => array('seq' => '8', 'way' => '123814343', 'node' => '305196299', 'lat' => -23.6191408, 'lon' => -46.673803800000002),
                18 => array('seq' => '9', 'way' => '123814343', 'node' => '305196300', 'lat' => -23.618347700000001, 'lon' => -46.673037299999997),
            );

            $firstNode = array ('seq' => '1', 'way' => '27796821', 'node' => '305197056', 'lat' => -23.628622400000001, 'lon' => -46.682599799999998);
            $lastNode = array ('seq' => '9', 'way' => '123814343', 'node' => '305196300', 'lat' => -23.618347700000001, 'lon' => -46.673037299999997);
            
            $this
                    ->given($_singleNodes = new Gpb_Model_OSM_NodeSorter($rua))
                    ->then
                    ->array($nodes = $_singleNodes->sort($rua))
                    ->sizeOf($nodes)->isEqualTo(count($rua))
                    ->array($nodes[0])->isEqualTo($firstNode)
                    ->array(end($nodes))->isEqualTo($lastNode);
        }
        
        public function testRuaComBifurcacao(){
            $rua = array (
                0 => array ( 'seq' => '1', 'way' => '234368001', 'node' => '1107272560', 'lat' => -23.620699399999999, 'lon' => -46.698715700000001, ),
                1 => array ( 'seq' => '1', 'way' => '258405447', 'node' => '299774329', 'lat' => -23.6256488, 'lon' => -46.691681000000003, ), 
                2 => array ( 'seq' => '1', 'way' => '328627486', 'node' => '1379439895', 'lat' => -23.626018699999999, 'lon' => -46.687616499999997, ),
                3 => array ( 'seq' => '1', 'way' => '258405442', 'node' => '301161371', 'lat' => -23.625864499999999, 'lon' => -46.691449599999999, ),
                4 => array ( 'seq' => '1', 'way' => '479262774', 'node' => '3354417162', 'lat' => -23.6258999, 'lon' => -46.687805500000003, ), 
                5 => array ( 'seq' => '1', 'way' => '258405449', 'node' => '1107272586', 'lat' => -23.625762399999999, 'lon' => -46.6880211, ),
                6 => array ( 'seq' => '1', 'way' => '4685074', 'node' => '3354630822', 'lat' => -23.626431199999999, 'lon' => -46.687498499999997, ),
                7 => array ( 'seq' => '1', 'way' => '578325170', 'node' => '5045471065', 'lat' => -23.620672500000001, 'lon' => -46.698813899999998, ),
                8 => array ( 'seq' => '1', 'way' => '258405448', 'node' => '4232007461', 'lat' => -23.6240694, 'lon' => -46.695580999999997, ),
                9 => array ( 'seq' => '1', 'way' => '123814326', 'node' => '1379439611', 'lat' => -23.620956899999999, 'lon' => -46.698670300000003, ),
                10 => array ( 'seq' => '1', 'way' => '123814383', 'node' => '1379439902', 'lat' => -23.626246999999999, 'lon' => -46.687802099999999, ),
                11 => array ( 'seq' => '1', 'way' => '423642968', 'node' => '5373807991', 'lat' => -23.6237727, 'lon' => -46.696104900000002, ),
                12 => array ( 'seq' => '1', 'way' => '328645696', 'node' => '3354630819', 'lat' => -23.6207688, 'lon' => -46.699018899999999, ),
                13 => array ( 'seq' => '1', 'way' => '4584654', 'node' => '29692352', 'lat' => -23.621076200000001, 'lon' => -46.698209300000002, ),
                14 => array ( 'seq' => '1', 'way' => '4685094', 'node' => '3354417156', 'lat' => -23.626250500000001, 'lon' => -46.687210399999998, ),
                15 => array ( 'seq' => '1', 'way' => '328627487', 'node' => '3354417161', 'lat' => -23.626185799999998, 'lon' => -46.687333600000002, ),
                16 => array ( 'seq' => '1', 'way' => '258405443', 'node' => '299774332', 'lat' => -23.625810699999999, 'lon' => -46.691700900000001, ),
                17 => array ( 'seq' => '1', 'way' => '328645697', 'node' => '1379439902', 'lat' => -23.626246999999999, 'lon' => -46.687802099999999, ),
                18 => array ( 'seq' => '1', 'way' => '519506880', 'node' => '302721028', 'lat' => -23.625830700000002, 'lon' => -46.6886473, ),
                19 => array ( 'seq' => '1', 'way' => '578325169', 'node' => '4743959835', 'lat' => -23.6206326, 'lon' => -46.698948100000003, ),
                20 => array ( 'seq' => '1', 'way' => '519506884', 'node' => '302284797', 'lat' => -23.626134799999999, 'lon' => -46.687980799999998, ),
                21 => array ( 'seq' => '1', 'way' => '516913176', 'node' => '5045471070', 'lat' => -23.620529699999999, 'lon' => -46.698532499999999, ),
                22 => array ( 'seq' => '1', 'way' => '578325168', 'node' => '4743959839', 'lat' => -23.620786599999999, 'lon' => -46.698958400000002, ),
                23 => array ( 'seq' => '1', 'way' => '255792504', 'node' => '299278885', 'lat' => -23.6236493, 'lon' => -46.696008200000001, ),
                24 => array ( 'seq' => '1', 'way' => '516913174', 'node' => '2050908619', 'lat' => -23.620731899999999, 'lon' => -46.698609699999999, ),
                25 => array ( 'seq' => '1', 'way' => '481300649', 'node' => '29691530', 'lat' => -23.621203600000001, 'lon' => -46.698354500000001, ), 
                26 => array ( 'seq' => '1', 'way' => '258405446', 'node' => '302284555', 'lat' => -23.6227296, 'lon' => -46.697089599999998, ), 
                27 => array ( 'seq' => '1', 'way' => '258405445', 'node' => '1107272587', 'lat' => -23.625726, 'lon' => -46.691356300000002, ),
                28 => array ( 'seq' => '2', 'way' => '4584654', 'node' => '2614771316', 'lat' => -23.6207669, 'lon' => -46.698276900000003, ), 
                29 => array ( 'seq' => '2', 'way' => '516913176', 'node' => '5045471069', 'lat' => -23.620582500000001, 'lon' => -46.698602899999997, ),
                30 => array ( 'seq' => '2', 'way' => '481300649', 'node' => '2556998322', 'lat' => -23.621301200000001, 'lon' => -46.698251999999997, ),
                31 => array ( 'seq' => '2', 'way' => '519506880', 'node' => '5093129971', 'lat' => -23.625868400000002, 'lon' => -46.688504899999998, ),
                32 => array ( 'seq' => '2', 'way' => '328627487', 'node' => '3354417163', 'lat' => -23.626126599999999, 'lon' => -46.687440299999999, ),
                33 => array ( 'seq' => '2', 'way' => '4685074', 'node' => '3354417142', 'lat' => -23.6264933, 'lon' => -46.687388800000001, ),
                34 => array ( 'seq' => '2', 'way' => '123814383', 'node' => '1733551601', 'lat' => -23.626338499999999, 'lon' => -46.687747799999997, ),
                35 => array ( 'seq' => '2', 'way' => '258405449', 'node' => '5093129967', 'lat' => -23.625690899999999, 'lon' => -46.688179699999999, ),
                36 => array ( 'seq' => '2', 'way' => '519506884', 'node' => '4972840110', 'lat' => -23.626197900000001, 'lon' => -46.687874999999998, ),
                37 => array ( 'seq' => '2', 'way' => '578325169', 'node' => '1107272671', 'lat' => -23.6203702, 'lon' => -46.699706300000003, ), 
                38 => array ( 'seq' => '2', 'way' => '516913174', 'node' => '1107272560', 'lat' => -23.620699399999999, 'lon' => -46.698715700000001, ),
                39 => array ( 'seq' => '2', 'way' => '258405443', 'node' => '301161371', 'lat' => -23.625864499999999, 'lon' => -46.691449599999999, ),
                40 => array ( 'seq' => '2', 'way' => '328627486', 'node' => '4972840109', 'lat' => -23.6259558, 'lon' => -46.687723699999999, ),
                41 => array ( 'seq' => '2', 'way' => '328645696', 'node' => '4743959839', 'lat' => -23.620786599999999, 'lon' => -46.698958400000002, ),
                42 => array ( 'seq' => '2', 'way' => '258405448', 'node' => '1733551579', 'lat' => -23.624420600000001, 'lon' => -46.694842800000004, ),
                43 => array ( 'seq' => '2', 'way' => '479262774', 'node' => '1107272586', 'lat' => -23.625762399999999, 'lon' => -46.6880211, ),
                44 => array ( 'seq' => '2', 'way' => '123814326', 'node' => '29691530', 'lat' => -23.621203600000001, 'lon' => -46.698354500000001, ),
                45 => array ( 'seq' => '2', 'way' => '258405442', 'node' => '5091917737', 'lat' => -23.625888, 'lon' => -46.691319700000001, ),
                46 => array ( 'seq' => '2', 'way' => '234368001', 'node' => '5045471065', 'lat' => -23.620672500000001, 'lon' => -46.698813899999998, ),
                47 => array ( 'seq' => '2', 'way' => '258405447', 'node' => '5091917734', 'lat' => -23.625615700000001, 'lon' => -46.691804500000003, ),
                48 => array ( 'seq' => '2', 'way' => '578325168', 'node' => '3354630820', 'lat' => -23.620867799999999, 'lon' => -46.698802999999998, ), 
                49 => array ( 'seq' => '2', 'way' => '258405446', 'node' => '2614771342', 'lat' => -23.622790599999998, 'lon' => -46.697045099999997, ),
                50 => array ( 'seq' => '2', 'way' => '4685094', 'node' => '3354417161', 'lat' => -23.626185799999998, 'lon' => -46.687333600000002, ),
                51 => array ( 'seq' => '2', 'way' => '255792504', 'node' => '2614771345', 'lat' => -23.623554899999998, 'lon' => -46.696114100000003, ), 
                52 => array ( 'seq' => '2', 'way' => '328645697', 'node' => '3354630821', 'lat' => -23.626364299999999, 'lon' => -46.6876088, ),
                53 => array ( 'seq' => '2', 'way' => '258405445', 'node' => '5091917733', 'lat' => -23.6256971, 'lon' => -46.691509799999999, ),
                54 => array ( 'seq' => '2', 'way' => '578325170', 'node' => '4743959835', 'lat' => -23.6206326, 'lon' => -46.698948100000003, ),
                55 => array ( 'seq' => '2', 'way' => '423642968', 'node' => '4232007462', 'lat' => -23.623851599999998, 'lon' => -46.696003699999999, ),
                56 => array ( 'seq' => '3', 'way' => '516913176', 'node' => '5045471068', 'lat' => -23.620601000000001, 'lon' => -46.6986378, ),
                57 => array ( 'seq' => '3', 'way' => '258405447', 'node' => '29692346', 'lat' => -23.625361999999999, 'lon' => -46.692542600000003, ),
                58 => array ( 'seq' => '3', 'way' => '123814383', 'node' => '1753263341', 'lat' => -23.6264805, 'lon' => -46.687696000000003, ), 
                59 => array ( 'seq' => '3', 'way' => '578325169', 'node' => '2552937035', 'lat' => -23.6202556, 'lon' => -46.6998806, ), 
                60 => array ( 'seq' => '3', 'way' => '258405448', 'node' => '2538663786', 'lat' => -23.624769100000002, 'lon' => -46.694182300000001, ), 
                61 => array ( 'seq' => '3', 'way' => '255792504', 'node' => '2614771343', 'lat' => -23.623398699999999, 'lon' => -46.696293699999998, ), 
                62 => array ( 'seq' => '3', 'way' => '519506880', 'node' => '29691424', 'lat' => -23.625995, 'lon' => -46.688217000000002, ), 
                63 => array ( 'seq' => '3', 'way' => '4584654', 'node' => '5045471071', 'lat' => -23.620593899999999, 'lon' => -46.698287200000003, ),
                64 => array ( 'seq' => '3', 'way' => '481300649', 'node' => '5045471048', 'lat' => -23.621564200000002, 'lon' => -46.6980352, ),
                65 => array ( 'seq' => '3', 'way' => '328627487', 'node' => '1379439895', 'lat' => -23.626018699999999, 'lon' => -46.687616499999997, ),
                66 => array ( 'seq' => '3', 'way' => '423642968', 'node' => '4232007461', 'lat' => -23.6240694, 'lon' => -46.695580999999997, ), 
                67 => array ( 'seq' => '3', 'way' => '258405449', 'node' => '5093129968', 'lat' => -23.625634300000002, 'lon' => -46.688352700000003, ),
                68 => array ( 'seq' => '3', 'way' => '258405445', 'node' => '299774329', 'lat' => -23.6256488, 'lon' => -46.691681000000003, ), 
                69 => array ( 'seq' => '3', 'way' => '328627486', 'node' => '3354417162', 'lat' => -23.6258999, 'lon' => -46.687805500000003, ),
                70 => array ( 'seq' => '3', 'way' => '328645697', 'node' => '3354630822', 'lat' => -23.626431199999999, 'lon' => -46.687498499999997, ),
                71 => array ( 'seq' => '3', 'way' => '258405442', 'node' => '5091917736', 'lat' => -23.6259047, 'lon' => -46.691107299999999, ),
                72 => array ( 'seq' => '3', 'way' => '258405446', 'node' => '4787067356', 'lat' => -23.623273399999999, 'lon' => -46.696595700000003, ),
                73 => array ( 'seq' => '3', 'way' => '519506884', 'node' => '1379439902', 'lat' => -23.626246999999999, 'lon' => -46.687802099999999, ), 
                74 => array ( 'seq' => '3', 'way' => '578325168', 'node' => '4217916517', 'lat' => -23.620889999999999, 'lon' => -46.698754100000002, ),
                75 => array ( 'seq' => '4', 'way' => '258405449', 'node' => '5093129966', 'lat' => -23.6256208, 'lon' => -46.688478699999997, ),
                76 => array ( 'seq' => '4', 'way' => '519506880', 'node' => '4972840327', 'lat' => -23.626053899999999, 'lon' => -46.688118899999999, ),
                77 => array ( 'seq' => '4', 'way' => '578325168', 'node' => '1379439611', 'lat' => -23.620956899999999, 'lon' => -46.698670300000003, ), 
                78 => array ( 'seq' => '4', 'way' => '255792504', 'node' => '29692475', 'lat' => -23.623241799999999, 'lon' => -46.6964544, ), 
                79 => array ( 'seq' => '4', 'way' => '516913176', 'node' => '5045471067', 'lat' => -23.620625199999999, 'lon' => -46.698688500000003, ), 
                80 => array ( 'seq' => '4', 'way' => '258405448', 'node' => '29691427', 'lat' => -23.625470499999999, 'lon' => -46.692674199999999, ),
                81 => array ( 'seq' => '4', 'way' => '258405447', 'node' => '299169752', 'lat' => -23.624278700000001, 'lon' => -46.694790699999999, ),
                82 => array ( 'seq' => '4', 'way' => '481300649', 'node' => '5497274158', 'lat' => -23.621647100000001, 'lon' => -46.697969700000002, ),
                83 => array ( 'seq' => '4', 'way' => '258405442', 'node' => '29691426', 'lat' => -23.625903399999999, 'lon' => -46.690947299999998, ),
                84 => array ( 'seq' => '4', 'way' => '123814383', 'node' => '1379439910', 'lat' => -23.626649499999999, 'lon' => -46.687648299999999, ),
                85 => array ( 'seq' => '4', 'way' => '578325169', 'node' => '2426181725', 'lat' => -23.620149399999999, 'lon' => -46.699965900000002, ),
                86 => array ( 'seq' => '4', 'way' => '258405446', 'node' => '29691357', 'lat' => -23.6233489, 'lon' => -46.696525700000002, ),
                87 => array ( 'seq' => '5', 'way' => '255792504', 'node' => '1379439724', 'lat' => -23.622880800000001, 'lon' => -46.6967493, ),
                88 => array ( 'seq' => '5', 'way' => '516913176', 'node' => '5045471066', 'lat' => -23.620646399999998, 'lon' => -46.698737700000002, ),
                89 => array ( 'seq' => '5', 'way' => '578325169', 'node' => '1107272691', 'lat' => -23.619984800000001, 'lon' => -46.700037799999997, ),
                90 => array ( 'seq' => '5', 'way' => '481300649', 'node' => '5497274157', 'lat' => -23.621715500000001, 'lon' => -46.697915199999997, ),
                91 => array ( 'seq' => '5', 'way' => '258405448', 'node' => '5091917732', 'lat' => -23.625632499999998, 'lon' => -46.692268400000003, ),
                92 => array ( 'seq' => '5', 'way' => '519506880', 'node' => '302284797', 'lat' => -23.626134799999999, 'lon' => -46.687980799999998, ),
                93 => array ( 'seq' => '5', 'way' => '258405447', 'node' => '29692347', 'lat' => -23.623836000000001, 'lon' => -46.695673999999997, ),
                94 => array ( 'seq' => '5', 'way' => '258405449', 'node' => '29692343', 'lat' => -23.625622700000001, 'lon' => -46.688624799999999, ),
                95 => array ( 'seq' => '5', 'way' => '258405446', 'node' => '4232007459', 'lat' => -23.623664399999999, 'lon' => -46.696202300000003, ), 
                96 => array ( 'seq' => '5', 'way' => '258405442', 'node' => '302284802', 'lat' => -23.625895100000001, 'lon' => -46.690678599999998, ),
                97 => array ( 'seq' => '6', 'way' => '578325169', 'node' => '4246898827', 'lat' => -23.619875799999999, 'lon' => -46.700067300000001, ), 
                98 => array ( 'seq' => '6', 'way' => '258405442', 'node' => '664063905', 'lat' => -23.625853299999999, 'lon' => -46.690086999999998, ), 
                99 => array ( 'seq' => '6', 'way' => '258405448', 'node' => '5091917738', 'lat' => -23.625798499999998, 'lon' => -46.691755700000002, ),
                100 => array ( 'seq' => '6', 'way' => '258405449', 'node' => '5093129969', 'lat' => -23.625627699999999, 'lon' => -46.688912899999998, ),
                101 => array ( 'seq' => '6', 'way' => '258405447', 'node' => '5087359263', 'lat' => -23.623719999999999, 'lon' => -46.695906100000002, ),
                102 => array ( 'seq' => '6', 'way' => '255792504', 'node' => '1379439714', 'lat' => -23.6227664, 'lon' => -46.696842799999999, ),
                103 => array ( 'seq' => '6', 'way' => '258405446', 'node' => '5373807991', 'lat' => -23.6237727, 'lon' => -46.696104900000002, ),
                104 => array ( 'seq' => '6', 'way' => '481300649', 'node' => '1379439683', 'lat' => -23.622280499999999, 'lon' => -46.6974558, ),
                105 => array ( 'seq' => '6', 'way' => '516913176', 'node' => '5045471065', 'lat' => -23.620672500000001, 'lon' => -46.698813899999998, ),
                106 => array ( 'seq' => '7', 'way' => '258405442', 'node' => '29691359', 'lat' => -23.625792000000001, 'lon' => -46.6889337, ),
                107 => array ( 'seq' => '7', 'way' => '258405449', 'node' => '4787043246', 'lat' => -23.6256849, 'lon' => -46.689801099999997, ),
                108 => array ( 'seq' => '7', 'way' => '258405447', 'node' => '299278885', 'lat' => -23.6236493, 'lon' => -46.696008200000001, ),
                109 => array ( 'seq' => '7', 'way' => '481300649', 'node' => '302284555', 'lat' => -23.6227296, 'lon' => -46.697089599999998, ),
                110 => array ( 'seq' => '7', 'way' => '255792504', 'node' => '2614771334', 'lat' => -23.622630900000001, 'lon' => -46.696953399999998, ),
                111 => array ( 'seq' => '7', 'way' => '258405448', 'node' => '299774332', 'lat' => -23.625810699999999, 'lon' => -46.691700900000001, ),
                112 => array ( 'seq' => '8', 'way' => '255792504', 'node' => '1107272632', 'lat' => -23.622567499999999, 'lon' => -46.6970052, ),
                113 => array ( 'seq' => '8', 'way' => '258405449', 'node' => '5091917735', 'lat' => -23.625706999999998, 'lon' => -46.690125399999999, ),
                114 => array ( 'seq' => '8', 'way' => '258405442', 'node' => '5093129973', 'lat' => -23.625799000000001, 'lon' => -46.688817999999998, ),
                115 => array ( 'seq' => '9', 'way' => '255792504', 'node' => '1271529315', 'lat' => -23.6223399, 'lon' => -46.697184200000002, ),
                116 => array ( 'seq' => '9', 'way' => '258405442', 'node' => '5093129972', 'lat' => -23.625810000000001, 'lon' => -46.688739599999998, ),
                117 => array ( 'seq' => '9', 'way' => '258405449', 'node' => '29692344', 'lat' => -23.6257482, 'lon' => -46.690840799999997, ),
                118 => array ( 'seq' => '10', 'way' => '255792504', 'node' => '29692350', 'lat' => -23.621773900000001, 'lon' => -46.697637899999997, ),
                119 => array ( 'seq' => '10', 'way' => '258405449', 'node' => '1107272587', 'lat' => -23.625726, 'lon' => -46.691356300000002, ),
                120 => array ( 'seq' => '10', 'way' => '258405442', 'node' => '302721028', 'lat' => -23.625830700000002, 'lon' => -46.6886473, ),
                121 => array ( 'seq' => '11', 'way' => '255792504', 'node' => '1271529332', 'lat' => -23.6214719, 'lon' => -46.697894499999997, ), 
                122 => array ( 'seq' => '12', 'way' => '255792504', 'node' => '29692351', 'lat' => -23.621200099999999, 'lon' => -46.698115100000003, ),
                123 => array ( 'seq' => '13', 'way' => '255792504', 'node' => '29692352', 'lat' => -23.621076200000001, 'lon' => -46.698209300000002, ) );
                
            
                $firstNode = array ('seq' => '4', 'way' => '123814383', 'node' => '1379439910', 'lat' => -23.626649499999999, 'lon' => -46.687648299999999);
                $lastNode = array ( 'seq' => '6', 'way' => '578325169', 'node' => '4246898827', 'lat' => -23.619875799999999, 'lon' => -46.700067300000001, );
                
                $this
                    ->given($_singleNodes = new Gpb_Model_OSM_NodeSorter($rua))
                    ->then
                    ->array($nodes = $_singleNodes->sort())
                    ->sizeOf($nodes)->isEqualTo(69)
                    ->array($nodes[0])->isEqualTo($firstNode)
                    ->array(end($nodes))->isEqualTo($lastNode);
        }
        
        
    }


    
	/*
		Recebe um  array de nodes representando os segmentos de uma rua e organiza eles do primeiro ao ultimo
	*/
	class Gpb_Model_OSM_NodeSorter{
		
		private $_nodes;
		private $_currNode;
		private $_previousNode;
		private $_waysProcessed;
		
		function __construct($nodes){
			$this->_waysProcessed = array();
			
			$this->_nodes = $nodes;
		}
		
		function sort(){
			$singleNodes = $this->getSingleNodes($this->_nodes);
			
			if(count($singleNodes) == 2){
				$this->_currNode = $singleNodes[0];
				
				return $this->getSorted();
			}else{
				return $this->_connectNonContinuousPath();
			}
		}
		
		function getSorted(){
			$nodes = array();
			$c = 1000;
    		while($node = $this->getNext()){
    			$c--;
    			if($c < 0) _debug('Erro: recurcao infinitao ao tentar organizar os pontos', true);
    			
    			$nodes[] = $node;
    		}
    		
    		return $nodes;
		}
		
		function getNext(){
			$curr = $this->_currNode;
			$this->_currNode = $this->_getNextNode();
			$this->_previousNode = $curr;
			return $curr;
		}
		
		private function _getNextNode(){
			$node = $this->getNodeInTheSameWayAs($this->_currNode);
			
			if($node){
				return $node;
			}
			
			//se chegamos nesse ponto é porque o segmento acabou
			$this->_waysProcessed [] = $this->_currNode['way'];
			
			$node = $this->getNodeAdjacentToAndNotProcessed($this->_nodes, $this->_currNode);
			
			$nodeBifur = $this->_getBifurcationOn($node);
			if($nodeBifur){ //ignorar bifurcacoes
				$this->_takenBifurcationWay[] = $node['way']; //se lembrar de ter pego esse caminho caso essa bifrcação seja errado
				$this->_waysProcessed[] = $nodeBifur['way'];
			}
			
			return $node;
		}
		
	        private function _getBifurcationOn($n){
	        	foreach($this->_nodes as $node){
	        		if($node['node'] == $n['node'] && $node['way'] !== $n['way'] && !$this->_wasAlreadyProcessed($node) ){
	        			return $node;
	        		}
	        	}
	        	
	        	return false;
	        }
	        
			private function _wasAlreadyProcessed($node){
				return in_array($node['way'], $this->_waysProcessed);
			}
			
        function getNodeInTheSameWayAs($n){
        	if($this->_isFirstOfItsWayToBeProcessed($n)){
        		$this->_increment = $this->_hasNodesBiggerThan($n) ? 1 : -1;
        	}
        	
        	foreach($this->_nodes as $node){
        		if($node['seq'] == $n['seq'] + $this->_increment && $node['way'] == $n['way']){
        			return $node;
        		}
        	}
        	
        	return false;
        }
        
    	private function _hasNodesBiggerThan($firstNodeOfWay){
        	foreach($this->_nodes as $node){
        		if($node['seq'] > $firstNodeOfWay['seq'] && $node['way'] == $firstNodeOfWay['way']){
        			return true;
        		}
        	}
        	
        	return false;
    	}
		
        public function getSingleNodes($nodes) {
            $singleNodes = array();

            foreach ($nodes as $node) {
                if (!$this->getNodeAdjacentTo($nodes, $node) && $this->isAtTheEndsOfItsWay($nodes, $node)) {
                    $singleNodes[] = $node;
                }
            }

            return $singleNodes;
        }

        public function getNodeAdjacentTo($nodes, $n) {
        	$adjacentNodes = array();
            foreach ($nodes as $node) {
                if ($node['node'] == $n['node'] && $node['way'] !== $n['way']) { //&& !$this->_wasAlreadyProcessed($node)
                    $adjacentNodes[] = $node;
                }
            }
			
            return $adjacentNodes;
        }
        
        public function getNodeAdjacentToAndNotProcessed($nodes, $n) {
            foreach ($nodes as $node) {
                if ($node['node'] == $n['node'] && $node['way'] !== $n['way'] && !$this->_wasAlreadyProcessed($node)) {
                    return $node;
                }
            }
			
            return false;
        }

        public function isAtTheEndsOfItsWay($nodes, $n) {
            $hasBigger = false;
            $hasSmaller = false;

            foreach ($nodes as $node) {
                if ($node['way'] == $n['way']) {
                    if (intval($node['seq']) > intval($n['seq'])) {
                        $hasBigger = true;
                    } else if (intval($node['seq']) < intval($n['seq']) ) {
                        $hasSmaller = true;
                    }
                }
            }

            return !($hasBigger && $hasSmaller);
        }
        
    	private function _isFirstOfItsWayToBeProcessed($node){
    		return $this->_previousNode['way'] != $node['way'];
    	}
    	
    	private function _connectNonContinuousPath(){
    		$nodes = $this->_getLeftRigthPaths();
    	//	return $nodes;
			//se for menos da metada provavelmente cai numa bifurcação errada...
			if(count($nodes) < count($this->_nodes) / 2){ 
				$this->_waysProcessed = $this->_takenBifurcationWay;
				$nodes = $this->_getLeftRigthPaths(); //tentar de novo ignorando a bifurcação
			}
			
			return $nodes;
    	}
    	
		private function _getLeftRigthPaths(){
			$this->_currNode = $this->_getRightmostNode($this->_nodes);
			$nodesFromRightSide = $this->getSorted();
		//	return $nodesFromRightSide;
			$this->_currNode = $this->_getLeftmostNode($this->_nodes);
			$nodesFromLeftSide = $this->getSorted();
			
			$nodesFromLeftSide = array_reverse($nodesFromLeftSide);
			
			return array_merge($nodesFromRightSide, $nodesFromLeftSide);
		}
		
		private function _getLeftmostNode($nodes){
			return array_reduce($nodes, function($acco, $value){
				if(!$acco) $acco = $value;
				return $acco['lat'] > $value['lat'] ? $acco : $value;
			});
		}
		
		private function _getRightmostNode($nodes){
			return array_reduce($nodes, function($acco, $value){
				if(!$acco) $acco = $value;
				return $acco['lat'] < $value['lat'] ? $acco : $value;
			});
		}
    	
	}
    
    
    