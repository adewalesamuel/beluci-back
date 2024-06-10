<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("pages")->insert([
            [
                'title' => 'accueil',
                'slug' => 'accueil',
                'description' => "la page d'accueil",
                'keywords' => 'accueil',
                'display_img_url' => '',
                "section_list" => json_encode([
                    [
                        "name" => "homeHero",
                        "backgroundImgUrl" => '',
                        "title" => "Chambre de commerce belge et luxembougeoise de côte d'ivoire",
                        "description" => "La BELUCI a pour mission, entre autres, d'accompagner les sociétés belgo-luxembourgeoises souhaitant s'implanter en Côte d'Ivoire, d'apporter un appui aux entreprises belges installées localement, de soutenir les sociétés ivoiriennes souhaitant entrer en contact et travailler avec des entreprises belgo-luxembourgeoises, de représenter ses adhérents auprès des autorités ivoiriennes mais également de défendre leurs intérêts et de créer des rendez-vous de networking pour faciliter les contacts et ce dans une ambiance agreable.
            Adhérer à la BELUCI c'est ainsi vous donner la possibilité d'améliorer la compétitivité de votre entreprise, développer de nouvelles opportunités d'affaires et étendre votre réseau.
            La Chambre de commerce belge et luxembourgeoise de Côte d'ivoire est une association sans but lucratif de droit belge, juridiquement et financièrement autonome, fondée en 1985 pour favoriser les contacts entre la Belgique et la Côte d'Ivoire.

            Ses ressources proviennent essentiellement des contributions de ses membres et du produit de ses activités. En 2020, elle a fêté ses 35 ans d'existence en faisant peau neuve. Un changement de nom - pour mieux refléter l'inclusion des Luxembourgeois - a accompagné un changement de logo et d'image mais n'a pas modifié le dynamisme qui la caractérise depuis sa création.

            La doyenne des chambres de commerce est une institution connue et appréciée des Ivoiriens.

            Elle réunit plus de 150 membres, mélange de filiales ivoiriennes d'entreprises ayant leur siège en Belgique ou au Luxembourg, d'entreprises de droit ivoirien créées par des citoyens Belges, de belges opérant au sein d'entreprises européennes et autres, et même d'entreprises ivoiriennes ayant tout simplement des liens privilégiés avec la Belgique.

            Depuis peu, la BELUCI fait aussi la place aux entreprises qui sans avoir de présence juridique en Côte d'Ivoire entretiennent une relation forte avec le pays parce allis v font du commerce mil executent des mrniers les entrenrIses nelIvent desormaIs etre membres « a distance » et neanmoins heneticier des reseaUx etservices de la BELUCI.

            Après une période marquée par un contexte sanitaire difficile au niveau mondial, la BELUCI a pu poursuivre ses activités habituelles, entre cocktails de networking séances d'information, mises en relation, visites d'entreprises et forums internationaux.

            En 2022, la BELUCI a proposé un événement inédit : « le Festival ivoiro-belge ». Cette rencontre entrait dans le contexte du renforcement de l'excellente collaboration qui colore les échanges entre la Belgique et la Côte d'Ivoire. En effet, ces deux pays entretiennent, depuis 60 ans, d'excellentes relations commerciales et la BELUCI est persuadée qu'un contexte d'échange multiculturel est propice au développement et à l'enrichissement de ces relations. L'évènement a été un tel succês, qu'il est d'ores et déjà considéré comme élément phare du calendrier social abidjanais.

            L'année 2023 a vu la deuxième édition du FIB, qui fut un grand succès, mais également un changement de bureau et donc de nouvelles orientations. La Chambre souhaite dorénavant s'impliquer directement dans des thématiques stratégiques annoncées par la BLCCA (Belgian-Luxembourg Chambers of Commerce abroad) autour des ODD. Elle sera également le cadre d'un projet de partenariat avec ENABEL, la coopération belge en Côte d'ivoire.",
                        "buttonText" => "Lire la suite"
                    ],
                    [
                        "name" => "homeEvent",
                        "title" => "Nos évènements",
                        "buttonText" => "Voir tous nos évènements",
                        "buttonLink" => "/",
                    ],
                    [
                        "name" => "homePresident",
                        "title" => "Mot du président",
                        "description" => " « La BELUCI a construit et développé des relations professionnelles  durables depuis près de 40 ans de manière ininterrompue. Le réseau  développé en Côte d'Ivoire englobe les multinationales du BeLux, les  grandes entreprises et PME locales, les incubateurs, les Chambres de  commerces, ainsi que les institutions publiques, parapubliques et non  gouvernementales. En 2022, j'ai eu l'honneur d'intégrer le  Conseil de la BLCCA (Belgian-Luxembourg Chambers of Commerce abroad) en  tant qu'Administrateur, et Maximilien Lemaire, le fondateur de la BELUCI,  est membre du bureau central national de la Chambre de commerce du Grand-Duché  de Luxembourg, ce qui positionne donc La BELUCI également fortement sur la scène  internationale. C'est autour de cet aspect que j'ambitionne  d'orienter mon mandat en tant que Président de la Chambre belge et  luxembourgeoise de Côte d'Ivoire : être au cœur des synergies entre nos  3 pays afin de faire éclore des partenariats fructueux et de développer des alliances toujours plus solides. »",
                        "authorName" => "Pierre DECLERCK",
                        "authorJob" => "Président",
                        "authorImgUrl" => ''
                    ],
                    [
                        "name" => "homeTeamList",
                        "title" => "Présentation du conseil d'administration",
                        "item_list" => json_encode([
                            [
                                "name" => "Michael Eeckout",
                                "job" => "Administrateur",
                                "linkedinLink" => "link"
                            ],
                            [
                                "name" => "Pierre DECLERCK",
                                "job" => "Président",
                                "linkedinLink" => "link"
                            ],
                            [
                                "name" => "M. Maximilien LEMAIRE",
                                "job" => "Président Honoraire / Fondateur / Président d'Honneur",
                                "linkedinLink" => ""
                            ],
                            [
                                "name" => "S. E.Mme Carole van EYLL",
                                "job" => "Órósirerte Fonneur",
                                "linkedinLink" => "link"
                            ],
                            [
                                "name" => "M. Jean-Philippe DIEUDONNE",
                                "job" => "Secretaire General",
                                "linkedinLink" => ""
                            ],
                            [
                                "name" => "Monsieur Lionel GREBAN",
                                "job" => "Vice-Président",
                                "linkedinLink" => "likn"
                            ],
                            [
                                "name" => "Jean-François ALBRECHT",
                                "job" => "Trésorier",
                                "linkedinLink" => "link"
                            ],
                            [
                                "name" => "M. Antonioni BASSIT",
                                "job" => "Administrateur",
                                "linkedinLink" => "link"
                            ],
                            [
                                "name" => "Mme Nadine GELBGRAS",
                                "job" => "Administratrice",
                                "linkedinLink" => "link"
                            ],
                            [
                                "name" => "M. Vincent PIERARD",
                                "job" => "Administrateur",
                                "linkedinLink" => "link"
                            ],
                            [
                                "name" => "Mme Hilde LAMBILOTTE",
                                "job" => "Présidente honoraire",
                                "linkedinLink" => "link"
                            ],
                            [
                                "name" => "Mme Valentine GEURTS AKPESS",
                                "job" => "Presidente honoraire",
                                "linkedinLink" => " "
                            ],
                            [
                                "name" => "M. Karim RAJAN",
                                "job" => "Président honoraire",
                                "linkedinLink" => "link"
                            ]
                        ])
                    ],
                    [
                        "name" => "homeTeamDetail",
                        "title" => "Présentation du conseil d'administration",
                        "landscapeImgUrl" => '',
                        "portraitImgUrl" => '',
                        "item_list" => json_encode([
                            [
                                "name" => "Salomé YSEBAERT",
                                "job" => "Responsable de l'implémentation du projet PEM N'ZASSA",
                                "email" => "salmome.beluci@gmail.com",
                                "phoneNumber" => ""
                            ],
                            [
                                "name" => "Paulina ADEMOLA",
                                "job" => "Assistante administrative",
                                "email" => "secretariat.beluci@gmail.com",
                                "phoneNumber" => "(+225) 07 07 40 96 72"
                            ]
                        ])
                    ]
                ])
            ],
            [
                'title' => 'Nos services',
                'slug' => 'services',
                'description' => "La page de services",
                'keywords' => 'accueil',
                'display_img_url' => '',
                "section_list" => json_encode([
                    [
                        "name" => "titleHeader",
                        "title" => "Nos Services",
                        "backgroundImgUrl" => '',
                    ],
                    [
                        "name" => "service",
                        "title" => "Nous accompagnons nos membres dans le développement de leur entreprise",
                        "description" => "La BELUCI est un véritable facilitateur pour s'ouvrir sur de nouveaux marchés et une toile de contacts professionels pour échanger avec des millires d'entreprises à traveres le réseau des Chambres de Commerce et d'industrie de Belgique, au Grand-Duché de Luxembourg et en Côte d'Ivoire",
                        "item_list" => [
                            [
                                "number" => "01",
                                "title" => "Propositions d'affaires",
                                "description" => "Vous êtes à la recherche de contacts commerciaux d'entreprises ivoiriennes ou belges ? La BELUCI dispose de fichiers d'entreprises. d'annuaires professionnels et de banques de données sectorielles",
                            ],
                            [
                                "number" => "02",
                                "title" => "Networking",
                                "description" => "Nous organisons des évènements qui ontpour but d'agrancir votre reseau professionnel afin d'encourager la formation de partenariats",
                            ],
                            [
                                "number" => "03",
                                "title" => "Accès continu",
                                "description" => "Grace a notre application communautaire voUs bouvez rester en contact avec nos membres et promouvoir vos Services.",
                            ],
                            [
                                "number" => "04",
                                "title" => "Informations & communications",
                                "description" => "Nous restons a lecoute des dernieres actualités nationales pour que vous soyez les premiers informés lors d'une nouvelle importante",
                            ],
                            [
                                "number" => "05",
                                "title" => "Conseil & Acompagnement",
                                "description" => "Nous offrons les ressources nécessaires pour conseiller les entreprises étrangères sur les opportunités commerciales qui s'ottrent a elles en cote d'ivoire.",
                            ],
                            [
                                "number" => "06",
                                "title" => "Formations",
                                "description" => "Nous vous proposons des formations dans divers domaines tels que des formations de gestion de ressources humaines, de comptabilité, de transformation digitale.",
                            ]
                        ]
                    ]
                ])
            ],
            [
                'title' => "Pem N'ZASSA",
                'slug' => 'pem-n-zassa',
                'description' => "Le projet pem N'Zassa",
                'keywords' => 'accueil',
                'display_img_url' => '',
                "section_list" => json_encode([
                    [
                        "name" => "titleHeader",
                        "title" => "PEM N'ZASSA",
                        "backgroundImgUrl" => '',
                    ],
                    [
                        "name" => "pemAbout",
                        "title" => "A propos du projet :",
                        "description" => "Depuis novembre 2023, la BELUCI s'est engagée en tant que partenaire dans le Projet de Mobilité des Entrepreneurs, le PEM N'ZASSA, une initiative visant à établir des partenariats fructueux entre les entreprises ivoiriennes, belges et luxembourgeoises. En tant que Chambre de commerce, notre mission consiste à promouvoir le développement économique et les échanges commerciaux entre ces différents pays.
            Notre participation à PEM N'ZASSA s'inscrit parfaitement dans cette mission. Ce projet, financé par l'Union Européenne et mis en œuvre par Enabel, l'Agence belge de développement, offre une opportunité exceptionnelle de concrétiser notre engagement envers nos membres et partenaires. Nous mobilisons notre expertise et notre réseau pour soutenir les entreprises belges et luxembourgeoises dans leur expansion en Côte d'Ivoire, tout en apportant un soutien actif aux entreprises déjà présentes sur ce marché dynamique.
            De plus, nous accompagnons également les entreprises ivoiriennes qui souhaitent établir des collaborations avec des entreprises belges ou européennes.En tant que partenaire privilégié, nous avons la capacité à faciliter les échanges commerciaux, à créer des synergies et opportunités concrètes et à instaurer un environnement propice au développement des affaires pour toutes les parties prenantes",
                        "backgroundImgUrl" => ''
                    ],
                    [
                        "name" => "pemFeature",
                        "title" => "Qu'offre concrètement le PEM N'ZASSA ?",
                        "item_list" => [
                            [
                                "number" => "01",
                                "description" => "Accès à des réseaux d'entrepreneurs, d'entreprises et d'incubateurs en Côte d'Ivoire et en Belgique."
                            ],
                            [
                                "number" => "02",
                                "description" => "Un processus de sélection rigoureux pour un matching avec une ou plusieurs entreprises ivoiriennes ou belges."
                            ],
                            [
                                "number" => "03",
                                "description" => "Une mise en relation avec les agences publiques ivoiriennes ou belges."
                            ],
                            [
                                "number" => "04",
                                "description" => "Une organisation d'événements et de rencontres B2B avec des entrepreneurs ivoiriens et belges."
                            ]
                        ],
                        "item_list" => [
                            "Notre projet bénéficie du soutien précieux de la Team Belgium, une coalition dynamique composée des services de l'ambassade du Royaume de Belgique, d'Enabel, des agences économiques telles que l'Awex, Flanders Trade, et hub.brussels, ainsi que de nombreux autres acteurs engagés.",
                            "Vous êtes entrepreneur basé en Belgique et intéressé par la Côte d'Ivoire ?",
                            "Ou entrepreneur ivoirien intéressé par la Belgique ?"
                        ],
                        "item_list" => [
                            "Alors, le projet PEM N'ZASSA est fait pour vous !",
                            "Voici les différentes étapes :"
                        ],
                        "item_list" => [
                            [
                                "number" => "Étape 1",
                                "title" => "LE MATCHING",
                                "description" => "Après votre inscription, nous vous mettons en relation avec un entrepreneur ivoirien ou belge actif dans votre secteur d'activité sélectionné par un comité d'experts. Si vous avez un intérêt mutuel à dévelooper un partenariat nous orgeniconc le vovece d'affaires de l'entrenreneur ivoirien en Beloique"
                            ],
                            [
                                "number" => "Étape 2",
                                "title" => "LA RENCONTRE EN BELGIQUE",
                                "description" => "Le vovage d'affaires, entièrement financé par Enabel, vous permet de vous rencontrer directement en Belgique et de participer à plusieurs événements et rencontres B2B avec des entrepreneurs ivoiriens et belges."
                            ],
                            [
                                "number" => "Étape 3",
                                "title" => "LE SUIVI DU PARTENARIAT",
                                "description" => "Le PEM soutient également le partenariat après le voyage d'affaires. Compte tenu des agendas très chargés des entrepreneurs.l'accompaanement du proiet reste flexible et adapté aux besoins des participants et de leur perteneriet"
                            ]
                        ]
                    ]
                ])
            ],
            [
                'title' => "Devenir Membre",
                'slug' => 'devenir-membre',
                'description' => "La page de membre",
                'keywords' => 'membre',
                'display_img_url' => '',
                "section_list" => json_encode([
                    [
                        "name" => "titleHeader",
                        "title" => "Devenir Membre",
                        "backgroundImgUrl" => ''
                    ],
                    [
                        "name" => "memberAbout",
                        "title" => "COMPLÉTEZ VOTRE FICHE D'INSCRIPTION ET REJOIGNEZ NOTRE RÉSEAU EN CÔTE D'IVOIRE!",
                        "description" => "Devenir membre de la Chambre de commerce belge et luxembourgeoise de Côte d'Ivoire c'est non seulement vous aider à faire des affaires en Côte d'Ivoire depuis la Belgique ou le Luxembourg et à vous guider à travers le paysage entrepreneurial ivoirien, mais c'est également bénéficier de nombreux avantages directs. En effet, en adhérant vous pourrez profiter de notre large réseau de contacts pour renforcer votre activité à travers les différents rendez-vous d'affaires ou évènements que nous organisons tout au long de l'année.",
                        "buttonText" => "Devenir membre",
                        "buttonLink" => "formulaire-membre"
                    ]
                ])
            ]
        ]);
    }
}
