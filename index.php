<!doctype html>
<html lang="en" class="h-100">
  <head>
    <title>Header</title>
    <meta charset="utf-8">
    <link href="./css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body class="d-flex h-100 text-center text-white">
    <div class=" d-flex mx-auto flex-column justify-content-center">
      <header class="mb-auto">
        

        <nav class="nav nav-masthead d-flex justify-content-around pt-3" >
            <div>
              <h3 class="float-md-start mb-0 " ><img src="/images/logo.png"  alt="logo" width="150"></h3>
            </div>
            <div class="d-flex flex-row ">
              <a class="nav-link text-white btn btn-outline-success me-3" aria-current="page" href="pages/register.php">SIGN UP</a>
              <a class="nav-link text-white btn " id="gren" href="pages/log.php">SIGN IN</a>
            </div>
          </nav>

        <div class=" w-50 mx-auto" id="content">
          <h1>THE LIBRARY  READAMP </h1>
          <p class="lead">READAMP is a modern library that offers a diverse collection of books, audiobooks, magazines, and other resources for individuals of all ages. This online platform makes it easy to sign up and access their vast array of materials from anywhere in the world.</p>
          <p class="lead">
            <a href="pages/log.php" class="btn btn-lg mt-5" id="sign">CONNEXION</a>
          </p>
        </div>
        
      </header>

     
    </div>
    <script src="https://kit.fontawesome.com/c7a60e43cd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>




    public function create($table_name, $data) {
    $keys = array_keys($data);
    $values = array_values($data);
    $placeholders = implode(',', array_fill(0, count($keys), '?'));

    $query = "INSERT INTO $table_name (".implode(',', $keys).") VALUES ($placeholders)";

    $stmt = $this->conn->prepare($query);
    dump($values);
    dump($stmt);

    if($stmt->execute($values)) {
        return true;
    }
    return false;
}


<?php

  include '../includes/navbar.php';


  if (isset($_GET['add'])) {
    $table_name = 'Item';
    $data = [
      "Title" => $_GET['Title'],
      "Author_Name" => $_GET['Author'],
      "Duration" => $_GET['Duration'],
      "Status" => $_GET['Status'],
      "State" => $_GET['State'],
      "Edition_Date" => $_GET['Edition_Date'],
      "Purchase_Date" => $_GET['Puchase_Date'],
      "Cover_Image" => $_GET['Cover_Image'],
      "Category_Code" => $_GET['Category_Code']
    ]; 


    dump($_GET);
    dump($data);


    if ($sudo = $crud->create($table_name, $data)) {

      header("Location: profile.php");
      exit; 
    } else {
      echo "Error adding item.";
    }
  }


?>

          <section class="container mx-auto mt-5">
            <form method="GET"   id="moda-Add-item">
          <div class="modal-body">
            <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
								<label class="mb-2 text-muted" >Title :</label>
								<div class="w-75">
									<input id="Title" type="Title" class="form-control" name="Title" placeholder="Enter your Title Number ..."  autofocus>
									<div class="error text-danger"></div>
								</div>
							</div>
							<div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
								<label class="mb-2 text-muted">Author :</label>
								<div class="w-75">
									<input id="Author" type="text" class="form-control" name="Author" placeholder="Enter your Author ..." >
									<div class="error text-danger"></div>
								</div>
							</div>
              <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
								<label class="mb-2 text-muted">Duration :</label>
								<div class="w-75">
									<input id="Duration" type="text" class="form-control" name="Duration" placeholder="Enter your Duration ..." >
									<div class="error text-danger"></div>
								</div>
							</div>
              <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
								<label class="mb-2 text-muted">Status :</label>
								<div class="w-75">
									<input id="Status" type="text" class="form-control" name="Status" placeholder="Enter your Status ..." >
									<div class="error text-danger"></div>
								</div>
							</div>
              <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
								<label class="mb-2 text-muted">State :</label>
								<div class="w-75">
									<input id="State" type="text" class="form-control" name="State" placeholder="Enter your State ..." >
									<div class="error text-danger"></div>
								</div>
							</div>
              <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
                <label class="mb-2 text-muted">Edition Date :</label>
                <div class="w-75">
                  <input id="Edition_Date" type="date" class="form-control" name="Edition_Date" placeholder="Enter your Edition Date ..." >
                  <div class="error text-danger"></div>
                </div>
              </div>
              <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
                <label class="mb-2 text-muted">Purchase Date :</label>
                <div class="w-75">
                  <input id="Puchase_Date" type="date" class="form-control" name="Puchase_Date" placeholder="Enter your Puchase Date ..." >
                  <div class="error text-danger"></div>
                </div>
              </div>
              <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
               <label class="mb-2 text-muted" >Image :</label>
               <div class="w-75">
                 <input class="form-control" type="file" id="formFileMultiple" name="Cover_Image" >
                 <div class="error text-danger"></div>
               </div>
               </div>
                 <div class="mb-2 d-flex flex-row justify-content-between flex-wrap  ">
                    <label class="mb-2 text-muted" >State :</label>
                    <div class="w-75 d-flex flex-column">
                    <select class="form-select" name="Category_Code" id="select">
                            <option  disabled selected value=""><-- Choose a Category Code --> </option>
                            <?php foreach ($category as $key => $val) { ?>
                                <option value="<?php echo $val['Category_Code']; ?>"><?php echo $val['Category_Code']; ?></option>
                            <?php } ?>
                          </select>
										<div class="error text-danger"></div>
                    </div>
                  </div>
              <div class="align-items-center d-flex"> 
                <input type="submit" value="ADD ITEM" name="add" class="btn btn-primary ms-auto"> 
            </div>

            </div>
          </div>
          </form>
          </section>
</body>
</html>


CREATE TABLE `Item` (
  `Item_Code` int(11) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Author_Name` varchar(100) DEFAULT NULL,
  `Cover_Image` varchar(100) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Edition_Date` date DEFAULT NULL,
  `Purchase_Date` date DEFAULT NULL,
  `Status` varchar(150) DEFAULT NULL,
  `Category_Code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Item`
--

INSERT INTO `Item` (`Item_Code`, `Title`, `Author_Name`, `Cover_Image`, `State`, `Edition_Date`, `Purchase_Date`, `Status`, `Category_Code`) VALUES
(1, 'LA FEMME MOUSTIQUE : TEXTE INTEGRAL', 'Ghislaine Herbera', 'Item_Images/Audio_Book/wsgetimg (3).jpeg', 'Used - like new', '2022-01-10', '2022-01-10', 'Available', 3),
(2, 'PANIQUE DANS LA FORET', 'Clotilde Perrin', 'Item_Images/Audio_Book/1297509.jpg', 'Used', '2013-03-27', '2019-07-10', 'Borrowed', 3),
(3, 'PAX ET LE PETIT SOLDAT', 'Sara Pennypacker', 'Item_Images/Audio_Book/1297513.jpg', 'Used - like new', '2020-10-14', '2021-08-19', 'Reserved', 3),
(4, 'SOURICETTE VEUT UN AMOUREUX', 'François Vincent', 'Item_Images/Audio_Book/1296908.jpg', 'Used - like old', '2016-09-15', '2021-09-10', 'Available', 3),
(5, 'SAUTE-LA-PUCE', 'Benoit Debecker', 'Item_Images/Audio_Book/wsgetimg.jpeg', 'Broken', '2015-09-09', '2021-03-18', 'Unavailable', 3),
(6, 'PREMIERES NEIGES', 'Nelson', 'Item_Images/Audio_Book/wsgetimg (1).jpeg', 'New', '2022-05-06', '2022-03-30', 'Borrowed', 3),
(7, 'LA PYRAMIDE DES BESOINS HUMAINS', 'Caroline Sole', 'Item_Images/Audio_Book/A001765230.jpg', 'Used - like new', '2020-12-18', '2022-03-11', 'Available', 3),
(8, 'LA PETITE DANSEUSE - EDGAR DEGAS', 'Geraldine Elschner', 'Item_Images/Audio_Book/1102896.jpg', 'Used', '2017-10-19', '2022-07-07', 'Reserved', 3),
(9, 'SALSA !', 'Edouard Manceau', 'Item_Images/Audio_Book/9782375150788_thumb.jpg', 'Used - like old', '2021-10-06', '2022-06-10', 'Borrowed', 3),
(10, 'LE BRUIT DES NOMBRES', 'Jeanne Boyer', 'Item_Images/Audio_Book/wsgetimg (2).jpeg', 'Broken', '2020-05-29', '2022-01-31', 'Unavailable', 3),
(11, 'LES MITCHELL CONTRE LES MACHINES', 'Mike Rianda', 'Item_Images/Movie/V99999006506.jpg', 'New', '2020-03-04', '2021-07-09', 'Available', 4),
(12, 'HAM ON RYE', 'Taormina Tyler', 'Item_Images/Movie/V99999007601.jpg', 'Used - like new', '2022-08-11', '2022-09-11', 'Reserved', 4),
(13, 'JERK', 'Vienne Gisele', 'Item_Images/Movie/wsgetimg.jpeg', 'Used', '2022-05-19', '2022-07-21', 'Borrowed', 4),
(14, 'GREAT FREEDOM', 'Meise Sebastian', 'Item_Images/Movie/wsgetimg (1).jpeg', 'Used - like old', '2018-07-27', '2019-04-10', 'Reserved', 4),
(15, 'THE INNOCENTS', 'Vogt Eskil', 'Item_Images/Movie/0000000274442.jpg', 'Broken', '2017-03-02', '2017-08-11', 'Unavailable', 4),
(16, 'CLARA SOLA', 'Alvarez Mesen', 'Item_Images/Movie/wsgetimg (2).jpeg', 'New', '2022-02-07', '2022-02-09', 'Available', 4),
(17, 'LE PEUPLE LOUP', 'Moore Tomm', 'Item_Images/Movie/0000000271977.jpg', 'Used - like new', '2021-01-13', '2022-01-14', 'Reserved', 4),
(18, 'SOUL', 'Docter Pete', 'Item_Images/Movie/V99999006516.jpg', 'Used', '2019-07-25', '2020-01-21', 'Borrowed', 4),
(19, 'SOUS LE CIEL DE KOUTAISSI', 'Koberidze Aleksandre', 'Item_Images/Movie/V99999008299.jpg', 'Used - like old', '2016-07-10', '2017-05-27', 'Available', 4),
(20, 'MEME LES SOURIS VONT AU PARADIS', 'Bubenicek Jan', 'Item_Images/Movie/0000000273262.jpg', 'Broken', '2014-09-04', '2015-08-29', 'Unavailable', 4),
(21, 'APRES LA CHUTE', 'Pierre-Henry Gomont', 'Item_Images/Comic/074ac8ed6b3c596776004f8e338af83bde47944d27e07e69ea5ea3cdc3a1a173.jpg', 'New', '2022-01-25', '2022-01-26', 'Available', 5),
(22, 'LA REPUBLIQUE DU CRANE', 'Vincent Brugeas', 'Item_Images/Comic/302d3ce65d4399b4abf8251d36fa0661d7623f60f8fa928a00ea7ab6d6ea538c.jpg', 'Used - like new', '2022-08-11', '2022-12-06', 'Available', 5),
(23, 'UN CONCOURS PLEIN D\'OBSTACLES !', 'Kristin Varner', 'Item_Images/Comic/794e63537953ef1486c97b8a60560ff7dc9d72e17e9d03ab83c9e587960b761c.jpg', 'Used', '2021-01-01', '2021-02-23', 'Reserved', 5),
(24, 'HARRY MAKITO, MAGICIEN & SAUVEUR DE SORCIERES. 1', 'Shizumu Watanabe', 'Item_Images/Comic/e3eea37ac3f238ffe109a101fe198b0b6cb2605e31f1eae9ef3185e2cd933d07.jpg', 'Used - like old', '2018-01-11', '2018-07-19', 'Borrowed', 5),
(25, 'CHER BLOPBLOP : LETTRE A MON EMBRYON', 'Lea Castor', 'Item_Images/Comic/4fbec7c24ebf7b699e1f8d80eb993a6aac12bb81c66fe8c939c04883bd884c84.jpg', 'Broken', '2016-02-08', '2017-01-31', 'Unavailable', 5),
(26, 'HORIMIYA. 1', 'Hero', 'Item_Images/Comic/5fe82a6ebaaf82b781bbba1e191ee401c058da8f7c2b73301abdbfabe78075ce.jpg', 'New\r\n', '2021-12-31', '2022-03-01', 'Available', 5),
(27, 'CE QUE NOUS SOMMES', 'Zep', 'Item_Images/Comic/ea6d8df9f4405831281f85f4858e045373cbf0888cbc3f4dd093c1726c5013f7.jpg', 'Used - like new', '2021-07-13', '2021-12-03', 'Reserved', 5),
(28, 'JE SUIS TOUJOURS VIVANT', 'Roberto Saviano', 'Item_Images/Comic/4718f52129741fc999c051f1020d99502e12af471028007b47c75573df21d2cc.jpg', 'Used', '2020-08-28', '2021-09-02', 'Borrowed', 5),
(29, 'LA LOUVE BOREALE', 'Nuria Tamarit', 'Item_Images/Comic/387c9f96d3ae60a8cf1bf2d7d66e8c50423b72eb1b333c30e071d0ad849a4aa7.jpg', 'Used - like old', '2018-07-23', '2019-03-28', 'Reserved', 5),
(30, 'LE PETIT FRERE', 'Jean-Louis Tripp', 'Item_Images/Comic/142e727314018b9d6fa322ffe2d49cb86db6c9dcdf6835f668b60780e5aade9a.jpg', 'Broken', '2017-03-01', '2017-06-15', 'Unavailable', 5),
(31, 'LOVE EXCHANGE FAILURE', 'White Ward. Musicien', 'Item_Images/Music/0634438580973_thumb.jpg', 'New', '2022-09-30', '2022-10-23', 'Available', 2),
(32, 'FEVER DREAMS PTS 1-4', 'Johnny Marr', 'Item_Images/Music/4050538706109_thumb.jpg', 'Used - like new', '2020-09-11', '2021-11-30', 'Reserved', 2),
(33, 'THE GLEAM', 'Park Jiha', 'Item_Images/Music/1228680.jpg', 'Used', '2018-07-25', '2019-01-24', 'Borrowed', 2),
(34, 'SHOALS', 'Palace', 'Item_Images/Music/0602438712960_thumb.jpg', 'Used - like old', '2017-06-23', '2017-09-16', 'Borrowed', 2),
(35, 'DB545', 'Db545', 'Item_Images/Music/0803341556607_thumb.jpg', 'Broken', '2012-08-17', '2014-01-17', 'Unavailable', 2),
(36, 'POMPEII', 'Cate Le Bon', 'Item_Images/Music/0184923131529_thumb.jpg', 'New', '2022-03-25', '2022-06-15', 'Available', 2),
(37, 'DRAGON NEW WARM MOUNTAIN I BELIEVE IN YOU', 'Big Thief', 'Item_Images/Music/0191400040823_thumb.jpg', 'Used - like new', '2020-07-23', '2020-10-30', 'Reserved', 2),
(38, 'MANNUS', 'Casse Gueule', 'Item_Images/Music/1234467.jpg', 'Used', '2019-07-07', '2020-08-29', 'Borrowed', 2),
(39, 'SONIC POEMS', 'Lewis OfMan', 'Item_Images/Music/0602445293896_thumb.jpg', 'Used - like old', '2014-03-12', '2016-07-12', 'Borrowed', 2),
(40, 'CONFLUENCE #2 : LE CHANT DES SOURCES', 'Isabelle Courroy', 'Item_Images/Music/3341348603698_thumb.jpg', 'Broken', '2016-03-31', '2017-01-20', 'Unavailable', 2),
(41, 'LE LIVRE SANS IMAGES', 'B. J. Novak', 'Item_Images/Book/2bef76287385920bb9770bb454d9cceef5571f9d8e6d45cf6c28bedcae8711f7.jpg', 'New', '2022-03-25', '2022-03-26', 'Borrowed', 1),
(42, 'MAYDALA EXPRESS', 'Davide Morosinotto', 'Item_Images/Book/45f52e20447a3b81516de547e69bd91d025928f9b695f353b9b7c482075001db.jpg', 'Used - like new', '2020-09-15', '2021-02-03', 'Reserved', 1),
(43, 'L\'ETE OU TOUT A FONDU : ROMAN', 'Tiffany McDaniel', 'Item_Images/Book/c45078e0f10b727bf5360f5fa86673f3f88333fc71106104fd903f8b310a6a68.jpg', 'Used', '2018-06-07', '2019-03-20', 'Available', 1),
(44, 'LA TREIZIEME HEURE : ROMAN', 'Emmanuelle Bayamack-Tam', 'Item_Images/Book/b96af83e9db11509917c704f4064eb0d35f8d65c1fd0a88c8567593df3a95ebd.jpg', 'Used', '2019-03-09', '2019-05-30', 'Reserved', 1),
(45, 'LA LIGNE DE NAGE : ROMAN', 'Julie Otsuka', 'Item_Images/Book/f2f22494fb52e831e8be71dc2c5969dc761c789ec17af4c96edd08629f0a7d10.jpg', 'Used - like old', '2017-06-13', '2018-01-15', 'Available', 1),
(46, 'LES COEURS ENDURCIS', 'Martyna Bunda', 'Item_Images/Book/4f380300adf3afe2f56aec9a3cebaf2ba143eba512050d83e699fa21f479063d.jpg', 'Broken', '2015-08-28', '2015-09-02', 'Unavailable', 1),
(47, 'UNE SURPRISE POUR AMOS MCGEE', 'Philip Christian', 'Item_Images/Book/079bd8ff61271504db3d7dbfbe7fc46f2f4c08a87ab4fb7da7a36f02c4135780.jpg', 'New', '2022-01-11', '2022-02-09', 'Reserved', 1),
(48, 'LEUR SANG COULE DANS TES VEINES', 'Rachel Burge', 'Item_Images/Book/64ab4232595d9e4d20a4bb76d2508100290b8006af7cdd138e91d7a38f2a330a.jpg', 'Used - like new', '2019-06-10', '2020-02-04', 'Available', 1),
(49, 'AU PARADIS JE DEMEURE', 'Attica Locke', 'Item_Images/Book/c80f59eefb7f0872ce8cda3577d5db807ff84aaf0e496198c46f943eb83c4619.jpg', 'Used', '2016-09-21', '2017-01-22', 'Available', 1),
(50, 'L\'ECOLE N\'EST PAS FAITE POUR LES PAUVRES ', 'Jean-Paul Delahaye', 'Item_Images/Book/21711074dc6316af8f3428a1e0e5348da54f8f86c708e0f3af8279a20ed0f121.jpg', 'Used - like old', '2019-03-01', '2019-04-01', 'Borrowed', 1);
