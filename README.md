GitChangeLogManifier
====================

This project try to help me building better changelog file from git, extracting data, ...
Building when I should sleep so I must do somathing like I wrote in doc/TODO.md

A log file a git like this :

commit 75caff1eabee5d60db73708c36aac6eac6927876
Date:   Sat Dec 10 13:34:18 2011 +0100
    Faute de frappe dans les noms de schemas
commit 7d20e1c52ee92e8ca9784027f6da202345f81796
Date:   Sat Dec 10 13:26:02 2011 +0100
    Modification des numeros de version
commit 45743a486183d2413f37e0dcae383f5a54203828
Date:   Sat Dec 10 12:04:02 2011 +0100
    Tabulations...
commit e83829f6ea86f22c1d46a9e8fa48a84c87946a79
Date:   Sat Dec 10 12:00:56 2011 +0100
    FSB_B_T#9763 Ne pas supprimer un sujet si on supprime sa trace
    Closes  #90
commit 7fdf785705e7230dd908d92f1f7d95e701b1e8ea
Date:   Fri Dec 9 15:18:22 2011 +0100
    Correction du bug #146 - Désactivation et fonctionalités toujours actives
commit bbb6b1d36f8ca02723baa7811daeef595c58a186
Date:   Thu Dec 8 18:31:54 2011 +0100
    Correction d'un doublon dans la liste des repertoires a chmoder
commit f1a91b566d721de2c64abe41fa857b7856a303e4
Date:   Wed Dec 7 14:24:21 2011 +0100
    Corrections des bugs concernant l'édition rapide AJAX
commit 1db00dc6283ea75a8203c5ebb623dd48ab97f52b
Date:   Wed Dec 7 13:42:36 2011 +0100
    Complément pour la fonction #61
commit 626d4924240cd52bc2ae7d9ea3c27453c148d783
Date:   Wed Dec 7 13:38:59 2011 +0100
    Implémentation de la fonction #61 - Explication des champs contact
commit 6852e8feb6e6a29f8e37b1667ac98aed148aa158
Date:   Tue Dec 6 23:49:25 2011 +0100
    Correction du but #21 - Erreur lors d'une installation rapide
commit ed4b4dd50541ac895990bc5dceb68ace1b6f6d4f
Date:   Tue Dec 6 15:45:12 2011 +0100
    Fonction #135 - Réduction du code utilisée pour la récupération des messages
commit 78325985a0466e796448dfbc7ce1e84837c6578d
Date:   Tue Dec 6 15:35:32 2011 +0100
    Ajout d'un commentaire
commit c39ea028ea9f04e1ecd0c39901f8d1d52d7db9cc
Date:   Tue Dec 6 15:33:24 2011 +0100
    Implémentation de la fonction #135 - Ajouter un lien pour les sujets postés ayant de nouvelles réponses

To sometinh like this

<?xml version="1.0" encoding="utf-8"?>
<?xml-stylesheet type="text/xsl" href="/utils/xsl/changelog.xsl"?>
<changelogs xmlns="http://www.w3.org/2000/xmlns/" xmlns:gh="https://github.com/Grummfy/GitChangeLogManifier/issue" xmlns:fsb="http://www.fire-soft-board.com/">
  <changelog name="Changelog">
    <lines>
      <line>
        <message><![CDATA[Faute de frappe dans les noms de schemas]]></message>
        <datas/>
      </line>
      <line>
        <message><![CDATA[Modification des numeros de version]]></message>
        <datas/>
      </line>
      <line>
        <message><![CDATA[Tabulations...]]></message>
        <datas/>
      </line>
      <line>
        <message><![CDATA[FSB_B_T#9763 Ne pas supprimer un sujet si on supprime sa trace
Closes  #90]]></message>
        <datas>
          <data xmlns:gh="https://github.com/Grummfy/GitChangeLogManifier/issue">
            <gh:issue xmlns:gh="https://github.com/Grummfy/GitChangeLogManifier/issue">
              <gh:id>90</gh:id>
            </gh:issue>
          </data>
          <data xmlns:fsb="http://www.fire-soft-board.com/">
            <fsb:topic xmlns:fsb="http://www.fire-soft-board.com/">
              <fsb:id>9763</fsb:id>
              <fsb:page>0</fsb:page>
              <fsb:qualifier>B</fsb:qualifier>
            </fsb:topic>
          </data>
        </datas>
      </line>
      <line>
        <message><![CDATA[Correction du bug #146 - Désactivation et fonctionalités toujours actives]]></message>
        <datas>
          <data xmlns:gh="https://github.com/Grummfy/GitChangeLogManifier/issue">
            <gh:issue xmlns:gh="https://github.com/Grummfy/GitChangeLogManifier/issue">
              <gh:id>146</gh:id>
            </gh:issue>
          </data>
        </datas>
      </line>
      <line>
        <message><![CDATA[Correction d'un doublon dans la liste des repertoires a chmoder]]></message>
        <datas/>
      </line>
      <line>
        <message><![CDATA[Corrections des bugs concernant l'édition rapide AJAX]]></message>
        <datas/>
      </line>
      <line>
        <message><![CDATA[Complément pour la fonction #61]]></message>
        <datas>
          <data xmlns:gh="https://github.com/Grummfy/GitChangeLogManifier/issue">
            <gh:issue xmlns:gh="https://github.com/Grummfy/GitChangeLogManifier/issue">
              <gh:id>61</gh:id>
            </gh:issue>
          </data>
        </datas>
      </line>
      <line>
        <message><![CDATA[Implémentation de la fonction #61 - Explication des champs contact]]></message>
        <datas>
          <data xmlns:gh="https://github.com/Grummfy/GitChangeLogManifier/issue">
            <gh:issue xmlns:gh="https://github.com/Grummfy/GitChangeLogManifier/issue">
              <gh:id>61</gh:id>
            </gh:issue>
          </data>
        </datas>
      </line>
    </lines>
  </changelog>
</changelogs>

See example folder to test
