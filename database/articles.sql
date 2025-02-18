-- --------------------------------------------------------
-- Hôte:                         C:\laragon\www\MonProjet\database\database.sqlite
-- Version du serveur:           3.45.3
-- SE du serveur:                
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES  */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de table database. articles
CREATE TABLE IF NOT EXISTS "articles" ("id" integer primary key autoincrement not null, "titre" varchar not null, "description" text not null, "context" text not null, "instruction" text not null, "image" varchar not null, "created_at" datetime, "updated_at" datetime);

-- Listage des données de la table database.articles : 11 rows
/*!40000 ALTER TABLE "articles" DISABLE KEYS */;
INSERT INTO "articles" ("id", "titre", "description", "context", "instruction", "image", "created_at", "updated_at") VALUES
	(1, 'Enim commodi', 'Quod quasi consectetur eos culpa fugit quis. Minus est quis distinctio voluptatem. Ut et quia aliquid autem alias.Sunt incidunt ea qui voluptatibus...', 'Quod quasi consectetur eos culpa fugit quis. Minus est quis distinctio voluptatem. Ut et quia aliquid autem alias.

Sunt incidunt ea qui voluptatibus debitis. Delectus modi quia est voluptate modi sunt. Modi molestiae quia ipsum ut suscipit quia.

Exercitationem maxime est eaque non nihil facere ipsam. Explicabo dolor consectetur nihil dolores. Quis aut amet vitae aut eos quis officia laborum. Quia asperiores eos ipsum ratione at harum.', 'Quos delectus ipsum quia eos autem.', 'https://placehold.co/600x400/746d69/c4db1e?text=consequatur', '2025-02-03 05:53:45', '2025-02-15 19:41:30'),
	(2, 'Qui consequatur ipsa culpa eos enim nostrum et.', 'Ullam autem sed incidunt quas. Enim voluptatem officiis at alias. Adipisci vel sit officia consequuntur animi. Vero qui velit quis recusandae.

Earum...', 'Ullam autem sed incidunt quas. Enim voluptatem officiis at alias. Adipisci vel sit officia consequuntur animi. Vero qui velit quis recusandae.

Earum aut molestiae eaque voluptate. Ut dolorem fuga dolor dolorum suscipit et ipsum. Distinctio natus fugiat iure est et fugit ut.

Laboriosam ut et est corrupti eos numquam repudiandae nemo. Enim eum quam quia quibusdam.', 'Ullam harum cumque non aut voluptatibus nobis.', 'https://placehold.co/600x400/1160ec/6ce6c7?text=asperiores', '2024-03-20 15:37:56', '2024-03-20 15:37:56'),
	(3, 'Delectus corporis aperiam blanditiis corrupti.', 'Reprehenderit qui nesciunt fuga ut non ducimus nobis blanditiis. Dolor sint velit dicta non natus necessitatibus culpa. Et voluptatem praesentium quia...', 'Reprehenderit qui nesciunt fuga ut non ducimus nobis blanditiis. Dolor sint velit dicta non natus necessitatibus culpa. Et voluptatem praesentium quia aliquam ut consequatur aliquid.

Tempore dignissimos delectus aliquam alias magnam quas quisquam. Quis quo architecto illum. Ut magnam commodi fugit minus sed perferendis.

Autem alias provident dignissimos quo iusto in et. Consequatur exercitationem ipsum dolore suscipit consequatur.', 'Et sint non fugit perferendis fugiat voluptatibus.', 'https://placehold.co/600x400/3d3f8c/4f249d?text=sunt', '2025-01-22 01:37:38', '2025-01-22 01:37:38'),
	(4, 'Sequi porro officiis consectetur aut quis.', 'Odio occaecati quaerat laborum sed eum. Adipisci fuga velit consequatur aut. Iusto id voluptatum qui illo ipsum sed laboriosam. Quo facere veniam vel...', 'Odio occaecati quaerat laborum sed eum. Adipisci fuga velit consequatur aut. Iusto id voluptatum qui illo ipsum sed laboriosam. Quo facere veniam vel vero quisquam cum ut et.

Ut aut expedita ducimus nesciunt. Qui quo aut maiores voluptatem quia. Quisquam illum sunt omnis quo. Quis perspiciatis repudiandae debitis.

Ipsam quod reiciendis dolorem commodi natus. Perferendis veritatis nam nihil aperiam quod. Et doloremque aut et suscipit. Dolor at enim ullam dolor.', 'Inventore quam quaerat quam eius ullam.', 'https://placehold.co/600x400/e13604/a2ba74?text=ea', '2024-09-28 03:37:58', '2024-09-28 03:37:58'),
	(5, 'Illo omnis in et facere dolores perferendis.', 'Doloribus dignissimos et doloremque eum. Consectetur corporis accusantium unde assumenda ut. Quis tempora et non. Voluptatibus impedit vel quia nihil...', 'Doloribus dignissimos et doloremque eum. Consectetur corporis accusantium unde assumenda ut. Quis tempora et non. Voluptatibus impedit vel quia nihil unde earum quas.

Est expedita nihil eius. Non possimus non excepturi nihil aspernatur. Sint dolore reiciendis et aperiam. Rerum repellendus et aliquam necessitatibus est optio natus officiis.

Odit dolorem quia est aliquid voluptas. Praesentium maiores porro et laborum. Tempore distinctio aut autem.', 'Laborum velit aut ut eos ut id facilis occaecati.', 'https://placehold.co/600x400/657c31/12e5be?text=libero', '2024-06-27 06:07:11', '2024-06-27 06:07:11'),
	(6, 'Omnis perspiciatis consequatur dolores repudiandae velit debitis eligendi.', 'Quae at iusto sunt commodi. In repellat rerum inventore vel culpa. Veniam sit voluptatem aliquam fugiat voluptas pariatur. Perferendis reiciendis ut p...', 'Quae at iusto sunt commodi. In repellat rerum inventore vel culpa. Veniam sit voluptatem aliquam fugiat voluptas pariatur. Perferendis reiciendis ut placeat.

Aut qui aut quia odio cupiditate. Quia numquam est animi accusantium neque. Minima placeat eos non ipsam ipsum. Et ut soluta perspiciatis doloribus possimus soluta.

Molestias placeat voluptatum nobis velit aut qui voluptas dolorem. Saepe quam maxime maxime tempora temporibus quisquam similique. Aut ut cum neque facere et aut. Temporibus labore est ullam delectus laudantium odio.', 'Dolores eum soluta reiciendis delectus similique ullam natus.', 'https://placehold.co/600x400/cc7f97/8b548e?text=optio', '2024-07-28 08:23:10', '2024-07-28 08:23:10'),
	(7, 'Saepe fugit cupiditate magni veniam consequatur autem.', 'Id modi a quae ut eveniet fugit vel. Sed ex hic aliquam temporibus commodi sint sit sed.

Aut aut quos est inventore et. Nesciunt aspernatur at fuga q...', 'Id modi a quae ut eveniet fugit vel. Sed ex hic aliquam temporibus commodi sint sit sed.

Aut aut quos est inventore et. Nesciunt aspernatur at fuga quod voluptas cumque. Sequi nulla sint in magnam dolore. Nobis praesentium quia autem magni eum explicabo enim.

Non excepturi et natus maiores. Fugiat optio totam culpa aut id corporis. Mollitia rerum voluptas voluptatum fugit eligendi doloribus aut.', 'Possimus eos a unde voluptas.', 'https://placehold.co/600x400/9966ce/99f33a?text=qui', '2024-08-27 15:03:10', '2024-08-27 15:03:10'),
	(8, 'Vel nihil itaque harum reiciendis.', 'Modifier une fois Nobis eum temporibus rerum nulla. Ut autem doloribus adipisci delectus beatae.Porro consequatur voluptate nesciunt neque velit facilis. Est repellen...', 'Nobis eum temporibus rerum nulla. Ut autem doloribus adipisci delectus beatae.

Porro consequatur voluptate nesciunt neque velit facilis. Est repellendus doloribus aut sapiente excepturi dolor pariatur. Delectus at tenetur ut.

Et vel consequatur placeat ducimus. Aut quia totam hic culpa. Alias repudiandae rerum consequatur soluta eos.', 'Sed quas et tenetur veritatis voluptatem maiores.', 'https://placehold.co/600x400/b9aa27/955861?text=qui', '2025-02-01 22:29:07', '2025-02-15 19:23:34'),
	(9, 'Ullam officiis enim omnis rem sint.', 'Non magnam nesciunt voluptatem repellendus quam quam et. Voluptatibus fugiat cum maxime ea. Quidem est animi nihil necessitatibus labore quam.

Rerum...', 'Non magnam nesciunt voluptatem repellendus quam quam et. Voluptatibus fugiat cum maxime ea. Quidem est animi nihil necessitatibus labore quam.

Rerum id eum dolores sapiente quia. Rerum et numquam ex qui omnis. Et velit harum ut sapiente est.

Et sed consequatur et ut ut et delectus. Et ratione et ut voluptas ut. Vel eaque iusto qui facere fugiat praesentium ab aut.', 'Ut aspernatur consequatur non.', 'https://placehold.co/600x400/96788d/1bb4e7?text=itaque', '2024-06-10 20:34:24', '2024-06-10 20:34:24'),
	(10, 'Minima rem rerum culpa nam est natus.', 'Porro vero laborum aut dolorem. In eius ut labore quidem beatae odit et nihil. Ut harum recusandae quo facilis id atque nemo. Fugit aut nobis consecte...', 'Porro vero laborum aut dolorem. In eius ut labore quidem beatae odit et nihil. Ut harum recusandae quo facilis id atque nemo. Fugit aut nobis consectetur corrupti eos explicabo eaque.

Voluptatem ullam voluptas quo similique eligendi. Deleniti commodi esse suscipit consequatur sit rerum. Ab qui officia numquam aliquam culpa. Quibusdam earum et veritatis neque.

Sit eaque ipsam et rerum. Soluta odio tempore eum et earum possimus sapiente. Omnis modi cupiditate est eos voluptas eum dolores. Enim sed blanditiis aut nobis qui.', 'Hic vitae dolores voluptas perspiciatis.', 'https://placehold.co/600x400/064a82/50247e?text=quibusdam', '2024-07-10 00:29:52', '2024-07-10 00:29:52'),
	(11, 'Article 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam vitae odio dolorum incidunt quaerat ab dolor soluta tenetur sint reiciendis...', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam vitae odio dolorum incidunt quaerat ab dolor soluta tenetur sint reiciendis.
Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam vitae odio dolorum incidunt quaerat ab dolor soluta tenetur sint reiciendis.
Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam vitae odio dolorum incidunt quaerat ab dolor soluta tenetur sint reiciendis.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam vitae odio doloru', 'https://placehold.co/600x400/388071/8481ca?text=New', '2025-02-15 18:33:39', '2025-02-15 18:33:39');
/*!40000 ALTER TABLE "articles" ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
