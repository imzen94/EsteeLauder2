<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=Storage::url('/css/styles2.css')?>">
</head>
<body>

    <a href="{{ route('home') }}">To view</a><br>
    <a href="{{ route('insert') }}">Insert new select</a>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="update" id="update">  
        Update:     

        <?php 
            
            // hide and show update form.
            echo '<style>.update_form { display:none;}</style>';
            if ($update == "update") {

                $target = '#update_form_'.$table;

                echo '<style>'.$target.' { display:block;}</style>';
                
            }
            
        ?>

        <form action="modify_banner" method="post" class="update_form" id="update_form_banners" enctype="multipart/form-data">
            @csrf

            <strong>banners:</strong><br>
            <!-- update form for banners -->

            <?php 
                $id = $name = $img = null;

                if($table=="banners"){
                    $id = $select->id;
                    $name = $select->name;
                    $img = $select->img;
                };

            ?>

            <input type="hidden" name="table" value="banners">
            <input type="hidden" name="id" value=<?=$id?>>

            <label for="name">Name:</label>
            <input type="text" name="name" value="<?= $name ?>"><br>

            <label for="old_img">Img:</label>
            <input type="text" name="old_img" class="old_img" value="<?= $img ?>" readonly="readonly"><br>
            <label for="new_img">Select image to upload, if you want to update:</label><br>
            <input type="file" name="new_img"><br>

            <input type="submit" value="Submit">



        </form>

        <form action="modify_category" method="post" class="update_form" id="update_form_categories" enctype="multipart/form-data">
            @csrf

            <strong>category:</strong><br>
            <!-- update form for category -->

            <?php 
                $id = $name_en = $name_cn = $img = null;
                
                if($table=="categories"){
                    $id = $select->id;
                    $name_en = $select->name_en;
                    $name_cn = $select->name_cn;
                    $img = $select->img;
                };
            ?>

            <input type="hidden" name="table" value="category">
            <input type="hidden" name="id" value=<?=$id?>>

            <label for="name_en">EN Name:</label>
            <input type="text" name="name_en" value="<?= $name_en ?>"><br>

            <label for="name_cn">CN Name:</label>
            <input type="text" name="name_cn" value="<?= $name_cn ?>"><br>

            <label for="old_img">Img:</label>
            <input type="text" name="old_img" class="old_img" value="<?= $img ?>" readonly="readonly"><br>
            <label for="new_img">Select image to upload, if you want to update:</label><br>
            <input type="file" name="new_img"><br>

        <input type="submit" value="Submit">

        </form>

        <form action="modify_product" method="post" class="update_form" id="update_form_products" enctype="multipart/form-data">
            @csrf

            <strong>products:</strong><br><br>
            <!-- update form for products -->

            <?php 
                $id = $category_id = $name_en = $name_cn = $img = $description = $star = null;
                
                if($table=="products"){
                    $id = $select->id;
                    $category_id = $select->category_id;
                    $name_en = $select->name_en;
                    $name_cn = $select->name_cn;
                    $img = $select->img;
                    $description = $select->description;
                    $star = $select->star;
                };
            ?>

            <input type="hidden" name="table" value="products">
            <input type="hidden" name="id" value=<?=$id?>>

            <label for="category_id">Category ID:</label>
            <input type="text" name="category_id" value="<?= $category_id ?>"><br>

            <label for="name_en">EN Name:</label>
            <input type="text" name="name_en" value="<?= $name_en ?>"><br>

            <label for="name_cn">CN Name:</label>
            <input type="text" name="name_cn" value="<?= $name_cn ?>"><br>

            <label for="old_img">Img:</label>
            <input type="text" name="old_img" class="old_img" value="<?= $img ?>" readonly="readonly"><br>
            <label for="new_img">Select image to upload, if you want to update:</label><br>
            <input type="file" name="new_img"><br>

            <label for="description">Description:</label>
            <textarea name="description" rows="4" cols="100"><?= $description ?></textarea><br>

            <label for="star">Star:</label><br>
            <input type="radio" name="star" value="1" <?php if($star=="1"){echo "checked";}; ?>>皇牌產品<br>
            <input type="radio" name="star" value="0" <?php if($star=="0"){echo "checked";}; ?>>普通產品<br>

            <input type="submit" value="Submit">


        </form>

        <form action="modify_social" method="post" class="update_form" id="update_form_socials" enctype="multipart/form-data">
            @csrf

            <strong>social:</strong><br>
            <!-- update form for social -->

            <?php 
                $id = $name = $img = $link = null;

                if($table=="socials"){
                    $id = $select->id;
                    $name = $select->name;
                    $img = $select->img;
                    $link = $select->link;
                };
            ?>

            <input type="hidden" name="table" value="social">
            <input type="hidden" name="id" value=<?=$id?>>

            <label for="name">Name:</label>
            <input type="text" name="name" value="<?= $name ?>"><br>

            <label for="old_img">Img:</label>
            <input type="text" name="old_img" class="old_img" value="<?= $img ?>" readonly="readonly"><br>
            <label for="new_img">Select image to upload, if you want to update:</label><br>
            <input type="file" name="new_img"><br>

            <label for="link">Link:</label>
            <input type="text" name="link" value="<?= $link ?>"><br>

            <input type="submit" value="Submit">


        </form>
            

        

        
    </div>


    <!-- Show all select, and modify delete button -->

    <table class="banners table">
        <!-- banners table -->
        <thead>
        <tr><th colspan="4">Banners</th></tr>
        <tr>
            <th scope="col">name</th>
            <th scope="col">img</th>
            <th scope="col">Modify</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($banners as $item){ ?>
        <tr>
            <td><?php echo $item->name;?></td>
            <td><img src="<?=Storage::url('./img/'.$item->img)?>"></td>
            <td>
                <form action='select' method="post">
                    @csrf
                    <input type="hidden" name="update" value="update">
                    <input type="hidden" name="table" value="banners">
                    <input type="hidden" name="id" value="<?= $item->id; ?>">
                    
                    <input type="submit" name="submit" value="Update">
                </form>
            </td>
            <td>
                <form action='delete_banner' method="post">
                    @csrf
                    <input type="hidden" name="table" value="banners">
                    <input type="hidden" name="id" value="<?= $item->id; ?>">
                    
                    <input type="submit" name="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>

    <table class="category table">
        <!-- category table -->
        <thead>
        <tr><th colspan="6">Category</th></tr>
        <tr>
            <th scope="col">name en</th>
            <th scope="col">name cn</th>
            <th scope="col">img</th>
            <th scope="col">Modify</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($categories as $categoryitem){ ?>
        <tr>
            <td><?php echo $categoryitem->name_en;?></td>
            <td><?php echo $categoryitem->name_cn;?></td>
            <td><img src="<?=Storage::url('./img/'.$categoryitem->img)?>"></td>
            <td>
                <form action='select' method="post">
                    @csrf
                    <input type="hidden" name="update" value="update">
                    <input type="hidden" name="table" value="categories">
                    <input type="hidden" name="id" value="<?= $categoryitem->id; ?>">
                    
                    <input type="submit" name="submit" value="Update">
                </form>
            </td>
            <td>
                <form action='delete_category' method="post">
                    @csrf
                    <input type="hidden" name="table" value="categories">
                    <input type="hidden" name="id" value="<?= $categoryitem->id; ?>">
                    
                    <input type="submit" name="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>

    <table class="products table">
        <!-- products table -->
        <thead>
        <tr><th colspan="7">Products</th></tr>
        <tr>
            <th scope="col">name en</th>
            <th scope="col">name cn</th>
            <th scope="col">img</th>
            <th scope="col">description</th>
            <th scope="col">star</th>
            <th scope="col">Modify</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($products as $product){ ?>
        <tr>
            <td><?php echo $product->name_en;?></td>
            <td><?php echo $product->name_cn;?></td>
            <td><img src="<?=Storage::url('./img/'.$product->img)?>"></td>
            <td><?php echo $product->description;?></td>
            <td><?php if($product->star=="1"){echo"皇牌產品";}else{echo"普通產品";};?></td>
            <td>
                <form action='select' method="post">
                    @csrf
                    <input type="hidden" name="update" value="update">
                    <input type="hidden" name="table" value="products">
                    <input type="hidden" name="id" value="<?= $product->id; ?>">
                    
                    <input type="submit" name="submit" value="Update">
                </form>
            </td>
            <td>
                <form action='delete_product' method="post">
                    @csrf
                    <input type="hidden" name="table" value="products">
                    <input type="hidden" name="id" value="<?= $product->id; ?>">
                    
                    <input type="submit" name="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>

    <table class="social table">
        <!-- social table -->
        <thead>
        <tr><th colspan="5">social</th></tr>
        <tr>
            <th scope="col">name</th>
            <th scope="col">img</th>
            <th scope="col">link</th>
            <th scope="col">Modify</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($socials as $item){ ?>
        <tr>
            <td><?php echo $item->name;?></td>
            <td><img src="<?=Storage::url('./img/'.$item->img)?>"></td>
            <td><?php echo $item->link;?></td>
            <td>
                <form action='select' method="post">
                    @csrf
                    <input type="hidden" name="update" value="update">
                    <input type="hidden" name="table" value="socials">
                    <input type="hidden" name="id" value="<?= $item->id; ?>">
                    
                    <input type="submit" name="submit" value="Update">
                </form>
            </td>
            <td>
                <form action='delete_social' method="post">
                    @csrf
                    <input type="hidden" name="table" value="socials">
                    <input type="hidden" name="id" value="<?= $item->id; ?>">
                    
                    <input type="submit" name="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    
</body>
</html>
