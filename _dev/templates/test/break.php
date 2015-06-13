{% extends "layout.html" %}


{% block content %}
 {% for id_b in id_b %} 

<section id="master">
    <header>
        <article>
            <ul>
                <li>   {{ id_b.date  }}</li>
            </ul>
        </article>
    </header>
    <!-- articulo principal -->
    <article>
        <header>
            <nav> {{ id_b.id }}</nav>
            <h1>  {{ id_b.program_name  }}</h1>
            <nav>sharing</nav>
        </header>
        {{ id_b.content  }}
    </article>
    <!-- articulo principal -->
    <section id="pmPublicity">
        <div>publicidad</div>
    </section>
    <section id="container">
        <section id="content">
            <!-- microContainerNew.php -->
            <!---microContainerPast.php -->
        </section>
        <aside>
            <!-- promotion -->

        </aside>
    </section>







    </article>
</section>


  {% endfor %}
{% endblock %}