<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Паттерны проектирования</title>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Open Server Panel</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body style="font-size: 26px">
<div style="text-align: left; width: 1100px; margin-left: 23%;">
    <h1 style="color:#6890ce;">
        Что такое паттерн?<br>
    </h1>
    Паттерн проектирования — это часто встречающееся решение определённой проблемы при проектировании архитектуры программ.
    В отличие от готовых функций или библиотек, паттерн нельзя просто взять и скопировать в программу. Паттерн представляет собой не какой-то конкретный код,
    а общую концепцию решения той или иной проблемы, которую нужно будет ещё подстроить под нужды вашей программы.

    <h2 style="color:#6890ce;">
        Из чего состоит паттерн?<br>
    </h2>
    <div style="text-align: left">
        <ul>
            <li>проблема, которую решает паттерн;</li><br>
            <li>мотивации к решению проблемы способом, который предлагает паттерн;</li><br>
            <li>структуры классов, составляющих решение;</li><br>
            <li>примера на одном из языков программирования;</li><br>
            <li>особенностей реализации в различных контекстах;</li><br>
            <li>связей с другими паттернами.</li><br>
        </ul>
    </div>

    <h2 style="color:#6890ce;">
        Кто придумал паттерны? <br>
    </h2>
    Концепцию паттернов впервые описал Кристофер Александер в книге «Язык шаблонов. Города. Здания. Строительство». В книге описан «язык» для проектирования окружающей среды,
    единицы которого — шаблоны (или паттерны, что ближе к оригинальному термину patterns) — отвечают на архитектурные вопросы:
    какой высоты сделать окна, сколько этажей должно быть в здании, какую площадь в микрорайоне отвести под деревья и газоны.
    <br><br>
    Идея показалась заманчивой четвёрке авторов: Эриху Гамме, Ричарду Хелму, Ральфу Джонсону, Джону Влиссидесу. В 1994 году они написали книгу «Приемы объектно-ориентированного проектирования.
    Паттерны проектирования», в которую вошли 23 паттерна, решающие различные проблемы объектно-ориентированного дизайна. Название книги было слишком длинным, чтобы кто-то смог всерьёз его запомнить.
    Поэтому вскоре все стали называть её «book by the gang of four», то есть «книга от банды четырёх», а затем и вовсе «GoF book».

    <h2 style="color:#6890ce;">
        Зачем знать паттерны?<br>
    </h2>
    <ul>
        <li>Проверенные решения</li><br>
        <li>Стандартизация кода</li><br>
        <li>Общий программистский словарь</li><br>
    </ul>

    <h2 style="color:#6890ce;">
        Критика паттернов<br>
    </h2>
    <ul>
        <li>Костыли для слабого языка программирования</li><br>
        <li>Неэффективные решения</li><br>
        <li>Неоправданное применение</li><br>
    </ul>

    <h2 style="color:#6890ce;">
        Основные паттерны проектирования<br>
    </h2>
    <ul>
        <li><a href="./fundamental/property_container">Контейнер свойств</a></li><br>
        <li><a href="./fundamental/delegation">Делегирование</a></li><br>
        <li><a href="./fundamental/event_channel">Канал событий</a></li><br>
        <li><a href="./fundamental/interface">Интерфейс</a></li><br>
    </ul>

    <h2 style="color:#6890ce;">
        Порождающие паттерны проектирования<br>
    </h2>
    Порождающие паттерны описывают создание (instantiate) объекта или группы связанных объектов.  В программной инженерии порождающими называют паттерны, которые используют
    механизмы создания объектов, чтобы создавать объекты подходящим для данной ситуации способом.
    Базовый способ создания может привести к проблемам в архитектуре или к её усложнению. Порождающие паттерны пытаются решать эти проблемы, управляя способом создания объектов.
    <ul>
        <li><a href="./creational/simple_factory">Простая фабрика</a></li><br>
        <li><a href="./creational/abstract_factory">Абстрактная фабрика</a></li><br>
        <li><a href="./creational/factory_method">Фабричный метод</a></li><br>
        <li><a href="./creational/singleton">Одиночка</a></li><br>
    </ul>

    <h2 style="color:#6890ce;">
        Структурные паттерны проектирования<br>
    </h2>
    Эти паттерны в основном посвящены компоновке объектов (object composition). То есть тому, как сущности могут друг друга использовать.
    Ещё одно объяснение: структурные шаблоны помогают ответить на вопрос «Как построить программный компонент?»
    Структурными называют паттерны, которые облегчают проектирование, определяя простой способ реализации взаимоотношений между сущностями.

    <ul>
        <li><a href="./structural/adapter">Адаптер</a></li><br>
        <li><a href="./structural/facade">Фасад</a></li><br>
        <li><a href="./structural/bridge">Мост</a></li><br>
    </ul>

    <h2 style="color:#6890ce;">
        Поведенческие паттерны проектирования<br>
    </h2>
    Они связаны с присвоением обязанностей (responsibilities) объектам. От структурных паттерны они отличаются тем, что не просто описывают структуру,
    но и очерчивают паттерны передачи данных, обеспечения взаимодействия. То есть поведенческие паттерны позволяют ответить на вопрос «Как реализовать поведение в программном компоненте?»
    Поведенческие паттерны проектирования определяют алгоритмы и способы реализации взаимодействия различных объектов и классов. Они обеспечивают гибкость взаимодействия между объектами.

    <ul>
        <li><a href="./behavioral/observer">Наблюдатель</a></li><br>
        <li><a href="./behavioral/iterator">Итератор</a></li><br>
        <li><a href="./behavioral/strategy">Стратегия</a></li><br>
    </ul>
</div>
</body>

</html>