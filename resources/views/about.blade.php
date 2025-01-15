<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Portfolio - My Blog Project</title>
</head>

<body>
    <header class="bg-primary text-white text-center py-4">
        <h1>My Blog Project</h1>
        <p>A simple blog platform built by me to showcase my development skills</p>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <header class="text-center mb-4">
            <h1>About My Blog Project</h1>
            <p class="text-muted">This project was built as part of my learning journey as a fresher in web development.</p>
        </header>

        <section>
            <h2>Who I Am</h2>
            <p>
                Hi, I'm Jaydeep Makwana, a passionate and motivated beginner web developer. I'm always eager to learn new technologies and improve my skills. This blog project represents my first attempt at creating a full-fledged web application, and I'm excited to share it with you.
            </p>
        </section>

        <section class="mt-4">
            <h2>What This Project Is About</h2>
            <p>
                This blog platform was created to provide a space for users to share articles, thoughts, and experiences. It is built using HTML, CSS, and PHP (Laravel framework). The project focuses on simple, user-friendly navigation, mobile responsiveness, and an easy-to-use content management system.
            </p>
        </section>

        <section class="mt-4">
            <h2>Technologies and Skills I Used</h2>
            <p>
                In this project, I applied my knowledge of:
                <ul>
                    <li>HTML5 and CSS3 for structure and styling</li>
                    <li>Bootstrap 5 for responsive design</li>
                    <li>PHP (Laravel) for backend development and database management</li>
                </ul>
                This project helped me gain practical experience with full-stack development, and I am excited to continue growing my skills in the field.
            </p>
        </section>

        <section class="mt-4">
            <h2>Why I Built This Blog</h2>
            <p>
                As a beginner developer, I wanted to create a project that would demonstrate my understanding of the development process from start to finish. By building this blog, I learned how to structure a web application, handle form submissions, and integrate various technologies to create a functional product.
            </p>
        </section>

        <footer class="bg-light py-4">
            <div class="container text-center">
                <p><strong><a href="https://www.linkedin.com/in/jaydeep-makwana-804279223/">
                            Created By Jaydeep Makwana
                        </a></strong></p>
            </div>
        </footer>
    </div> <!-- End container -->

    <!-- Bootstrap JS and Popper.js (required for the navbar toggle to work) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
