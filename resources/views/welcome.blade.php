@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <!--<h1><b>GradePlus</b></h1>-->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="https://poliquin.house.gov/sites/poliquin.house.gov/files/styles/congress_featured_image/public/featured_image/issues/Education-OpportunitySmall.jpg?itok=GblGRR_w" alt="Los Angeles" style="width:100%;height: 425px">
                    <div class="carousel-caption">
                        <h3>Welcome to GradePlus</h3>
                        <p>A marvellous grading website for you</p>
                    </div>
                </div>

                <div class="item">
                    <img src="https://www.simplilearn.com/ice9/free_resources_article_thumb/clearing-ccna-certification-top-study-tips-for-exam-rar272-article.jpg" alt="Chicago" style="width:100%; height: 425px">
                    <div class="carousel-caption">
                        <h3>Welcome to GradePlus</h3>
                        <p>A marvellous grading website for you</p>
                    </div>
                </div>

                <div class="item">
                    <img src="https://www.franchiseindia.com/uploads/content/edu/art/education-858cc07046.jpg" alt="New york" style="width:100%; height: 425px">
                    <div class="carousel-caption">
                        <h3>Welcome to GradePlus</h3>
                        <p>A marvellous grading website for you</p>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        <div class="jumbotron">
            <h4>GradePlus is the most suitable grading website ! </h4>
            <br/>

            <h4>This website is developed by:</h4>
            <br/>
            <h4>Md. Nahiyan Uddin</h4>
            <h4>1405102 , CSE14 , BUET</h4>
            <br/>
            <h4>Md. Mirajul Islam</h4>
            <h4>1405119 , CSE14 , BUET</h4>
        </div>
    </div>
@endsection
