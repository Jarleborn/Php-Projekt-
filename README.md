# Hampus Bildupladningstjänst!

##Vision

Jag har många gånger känt att jag har saknat en smidig tjänst för att ladda upp bilder som man kan dela med en snyg smidig delningslänk. Det tjänser som redan finns tycker jag har på tok för mycket reklam, vilket gör att det känns lite fishy att ladda upp saker där. Och framför allt nu när facebook har gjort så att man kan dela gifar så länge länke slutar på .gif så behövs verkligen en smidig tjänst för detta.

Så jag vill göra en tjänst som laddar upp bilder och pdfer utan massa lull lull och utan reklam. Detta är ett hjälpmedel för i första hand mig att kunna ladda upp bilder/giffar vilket gör att reklam känns onödigt då jag har nytta av sidan utan att tjäna pengar på den.

##Use-Cases


Lyckad Uppladning

1. Använaderen går in på sidan.

2. Användaren klickar på välj fil.

3. Användaren väljer en bild fil  

4. Användaren klickar "Skicka upp filen på servern".

5.1. Användaren får ett meddelande om att filen har laddats upp,

    5.2. får se filen och en länk till filen presenteras.  

        5.3. Om användaren vill ladda på en till så finns den möjligheten då formuläret ligger kvar


Misslyckad Uppladning

1. Använaderen går in på sidan.

2. Användaren klickar på välj fil.

3. Användaren väljer en .exe fil  

4. Användaren klickar "Skicka upp filen på servern".

5.1. Användaren får ett meddelande om att "Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.",

    5.2. Om användaren vill ladda på en till så finns den möjligheten då formuläret ligger kvar


Lista alla uppladade bilder

1. Använaderen går in på sidan.

2. Användaren klickar på "Ta bort en bild"

3. Alla biler i databasen vissas som miniatyrer


Ta bort en bild

1. Använaderen går in på sidan.

2. Användaren klickar på "Ta bort en bild"

3. Alla biler i databasen vissas som miniatyrer

4. Använadern läser texten "Klicka på en bild för att ta bort den "

5. Användaren klickar på en bild





**Mandatory test-cases**

1 - Upladning

	1.1 - När användaren klickar på "välj fil" så ska en ruta där anvädnaren kan blädra och välj filer från sin dator dycka upp

	1.2 - När användaren klickar på "Skicka upp filen på servern" så ska filen skickas vidare till valideringen

2 - Validering

	2.1 - Godtjända filer

		2.1.1 - Om användaren väljer en fil av typen PDF så ska ett meddelande om att filen har laddats upp

		2.1.2 - Om användaren väljer en fil av typen PNG så ska ett meddelande om att filen har laddats upp

		2.1.3 - Om användaren väljer en fil av typen JPEG så ska ett meddelande om att filen har laddats upp

		2.1.4 - Om användaren väljer en fil av typen GIF så ska ett meddelande om att filen har laddats upp

	2.2 - Felaktiga filer
		2.2.2 - Om användaren laddar upp en fil större en 1GB ska ett fel meddelande som säger "Exceeded filesize limit" vissas

		2.2.3 - Om användaren laddar upp en fil som inte är någon av följaden typer PDF, JPG, GIF and PNG så vissas ett meddelande som säger 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.'

3 - Visning

	3.1 -  När en uppladning lyckas ska bilden användaren valt vissas

	3.2 - När en uppladning lyckas ska en länk till bilden vissas

	3.3 - formuläret för uppladning ska alltid synsas för att öka möjligheten för att ladda upp en ny fil snabbt och smidigt

4- Nyligen uppladade bilder

	4.1 - När användaren kommer till sidan ska texten "Nyligen uppladdade bilder synas"

	4.2 - Under ska de fem senaste bilderna vissas.

	4.3 - Om användaren lyckas ladda upp den bild ska den läggas till första av de fem och den sista ska försvinan
