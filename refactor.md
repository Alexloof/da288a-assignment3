# Refaktorering

### Förslag 1 - views/home.blade.php

Markupen i denna vy repeteras för varje kategori. Istället för hårdkodad markup hade man kunnat passa en array av kategorier från controllern och renderat dessa i vyn med hjälp av en for loop för att bli mer DRY.

### Förslag 2 - Modell uppdatering i Controllers

Exempelvis i productscontroller i store och update metoderna så sätts alla produkters attribut och påminner väldigt mycket om varandra.
Man hade kunnat skapa en hjälpmetod i klassen som tar in produkten och requestet och hanterar de uppdateringar som sker, alternativt fyller i tidigare värde ifall bara enstaka attribut har ändrats.
Denna metod skulle då kunna användas i både store och update och således eliminera lite repetetiv kod. Man skulle kunna göra på liknande sätt i övriga controllers som hanterar resurser (modeller).
