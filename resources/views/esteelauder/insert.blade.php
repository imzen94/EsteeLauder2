<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=Storage::url('/css/styles2.css')?>">
</head>
<body>

    <a href="{{ route('home') }}">To view</a><br>
    <a href="{{ route('modify') }}">To modify data</a>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form action="insert_action_banner" method="post" class="form" enctype="multipart/form-data">
        @csrf

        <strong>Insert banners:</strong><br><br>

        <input type="hidden" name="table" value="banners">

        <label for="name">Name:</label>
        <input type="text" name="name"><br>

        <label for="img">Select image to upload:</label>
        <input type="file" name="img"><br>

        <input type="submit" value="Submit">

    </form>

    <form action="insert_action_category" method="post" class="form" enctype="multipart/form-data">
        @csrf
        <!-- Insert category -->

        <strong>Insert category:</strong><br><br>

        <input type="hidden" name="table" value="category">

        <label for="name_en">EN Name:</label>
        <input type="text" name="name_en"><br>

        <label for="name_cn">CN Name:</label>
        <input type="text" name="name_cn"><br>

        <label for="img">Select image to upload:</label>
        <input type="file" name="img"><br>

        <input type="submit" value="Submit">

    </form>

    <form action="insert_action_product" method="post" class="form" enctype="multipart/form-data">
        @csrf
        <!-- Insert Product -->

        <strong>Insert Product:</strong><br><br>

        <input type="hidden" name="table" value="products">

        <label for="category_id">Category ID:</label>
        <input type="text" name="category_id"><br>

        <label for="name_en">EN Name:</label>
        <input type="text" name="name_en"><br>

        <label for="name_cn">CN Name:</label>
        <input type="text" name="name_cn"><br>

        <label for="img">Select image to upload:</label>
        <input type="file" name="img"><br>

        <label for="description">Description:</label>
        <input type="text" name="description"><br>

        <label for="star">Star:</label><br>
        <input type="radio"  name="star" value="1">皇牌產品<br>
        <input type="radio" name="star" value="0">普通產品<br>

        <input type="submit" value="Submit">

    </form>

    <form action="insert_action_social" method="post" class="form" enctype="multipart/form-data">
        @csrf

        <strong>Insert social:</strong><br><br>

        <input type="hidden" name="table" value="social">

        <label for="name">Name:</label>
        <input type="text" name="name"><br>

        <label for="img">Select image to upload:</label>
        <input type="file" name="img"><br>

        <label for="link">Link:</label>
        <input type="text" name="link"><br>

        <input type="submit" value="Submit">

    </form>


   
    
</body>
</html>
