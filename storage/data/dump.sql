--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.10
-- Dumped by pg_dump version 9.5.10

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE rentclothes;
--
-- Name: rentclothes; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE rentclothes WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'pt_BR.UTF-8' LC_CTYPE = 'pt_BR.UTF-8';


ALTER DATABASE rentclothes OWNER TO postgres;

\connect rentclothes

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: address_client; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE address_client (
    address_id integer NOT NULL,
    client_id integer NOT NULL
);


ALTER TABLE address_client OWNER TO postgres;

--
-- Name: address_user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE address_user (
    address_id integer NOT NULL,
    user_id integer NOT NULL
);


ALTER TABLE address_user OWNER TO postgres;

--
-- Name: addresses; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE addresses (
    id integer NOT NULL,
    street character varying(255) NOT NULL,
    number integer NOT NULL,
    complement character varying(255),
    zip character varying(255) NOT NULL,
    district character varying(255) NOT NULL,
    city character varying(255) NOT NULL,
    state character varying(2) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE addresses OWNER TO postgres;

--
-- Name: addresses_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE addresses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE addresses_id_seq OWNER TO postgres;

--
-- Name: addresses_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE addresses_id_seq OWNED BY addresses.id;


--
-- Name: client_phone; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE client_phone (
    client_id integer NOT NULL,
    phone_id integer NOT NULL
);


ALTER TABLE client_phone OWNER TO postgres;

--
-- Name: clients; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE clients (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    rg character varying(255) NOT NULL,
    cpf character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE clients OWNER TO postgres;

--
-- Name: clients_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE clients_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE clients_id_seq OWNER TO postgres;

--
-- Name: clients_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE clients_id_seq OWNED BY clients.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE migrations_id_seq OWNED BY migrations.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE password_resets OWNER TO postgres;

--
-- Name: phone_user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE phone_user (
    phone_id integer NOT NULL,
    user_id integer NOT NULL
);


ALTER TABLE phone_user OWNER TO postgres;

--
-- Name: phones; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE phones (
    id integer NOT NULL,
    number character varying(15) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE phones OWNER TO postgres;

--
-- Name: phones_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE phones_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE phones_id_seq OWNER TO postgres;

--
-- Name: phones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE phones_id_seq OWNED BY phones.id;


--
-- Name: product_rent; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE product_rent (
    product_id integer NOT NULL,
    rent_id integer NOT NULL
);


ALTER TABLE product_rent OWNER TO postgres;

--
-- Name: products; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE products (
    id integer NOT NULL,
    description character varying(255) NOT NULL,
    size integer NOT NULL,
    price numeric(8,2) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE products OWNER TO postgres;

--
-- Name: products_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE products_id_seq OWNER TO postgres;

--
-- Name: products_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE products_id_seq OWNED BY products.id;


--
-- Name: rents; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE rents (
    id integer NOT NULL,
    client_id integer NOT NULL,
    user_id integer NOT NULL,
    start_at timestamp(0) without time zone,
    end_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE rents OWNER TO postgres;

--
-- Name: rents_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE rents_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE rents_id_seq OWNER TO postgres;

--
-- Name: rents_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE rents_id_seq OWNED BY rents.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY addresses ALTER COLUMN id SET DEFAULT nextval('addresses_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY clients ALTER COLUMN id SET DEFAULT nextval('clients_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY migrations ALTER COLUMN id SET DEFAULT nextval('migrations_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY phones ALTER COLUMN id SET DEFAULT nextval('phones_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY products ALTER COLUMN id SET DEFAULT nextval('products_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY rents ALTER COLUMN id SET DEFAULT nextval('rents_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: address_client; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY address_client (address_id, client_id) FROM stdin;
\.


--
-- Data for Name: address_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY address_user (address_id, user_id) FROM stdin;
\.


--
-- Data for Name: addresses; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY addresses (id, street, number, complement, zip, district, city, state, created_at, updated_at, deleted_at) FROM stdin;
\.


--
-- Name: addresses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('addresses_id_seq', 1, false);


--
-- Data for Name: client_phone; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY client_phone (client_id, phone_id) FROM stdin;
20	1
\.


--
-- Data for Name: clients; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY clients (id, name, rg, cpf, created_at, updated_at, deleted_at) FROM stdin;
1	Ulises Leffler	91256809	94846408771	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
2	Mary Larson	77880701	50598100939	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
3	Prof. Ned Beer DDS	93116128	54668987321	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
4	Marco Fadel Sr.	97441784	00775718573	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
5	Ms. Laura Bartell III	4902602	20531409050	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
6	Holly Bergnaum	60962320	13072878981	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
7	Malinda Osinski	30062548	84563300441	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
8	Dock Dickens	79651411	28912303281	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
9	Bailee Rodriguez	2080766	21022482825	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
10	Lew Koelpin	27150839	14659407972	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
11	Emery Lebsack	99201671	85116736440	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
12	Alyson O'Reilly Jr.	65258767	22718299660	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
13	Dortha Bashirian	32690243	30253393862	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
14	Jaron Kutch	89730611	61073160773	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
15	Alyce Koelpin	24742705	61540246757	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
16	Prof. Ibrahim Pacocha V	95056452	63493797554	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
17	Shania Renner IV	3110706	08134532812	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
18	Prof. Mina Little Sr.	55069415	02143484075	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
19	Erica Kshlerin	3980340	77730952497	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
20	Jaunita White	18331642	90791965337	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
\.


--
-- Name: clients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('clients_id_seq', 20, true);


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2014_10_12_100000_create_password_resets_table	1
3	2017_11_25_145528_create_products_table	1
4	2017_11_25_164519_create_clients_table	1
5	2017_11_25_195427_create_rents_table	1
6	2017_11_25_200205_create_product_rent_table	1
7	2017_11_26_124306_create_addresses_table	1
8	2017_11_26_204037_create_address_client_table	1
9	2017_11_26_204334_create_address_user_table	1
10	2017_11_27_093530_create_phones_table	1
11	2017_11_27_114845_create_phone_user_table	1
12	2017_11_27_115128_create_client_phone_table	1
\.


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('migrations_id_seq', 12, true);


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: phone_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY phone_user (phone_id, user_id) FROM stdin;
\.


--
-- Data for Name: phones; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY phones (id, number, created_at, updated_at, deleted_at) FROM stdin;
1	11111111111	2017-11-27 20:20:02	2017-11-27 20:20:02	\N
\.


--
-- Name: phones_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('phones_id_seq', 1, true);


--
-- Data for Name: product_rent; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY product_rent (product_id, rent_id) FROM stdin;
2	1
\.


--
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY products (id, description, size, price, created_at, updated_at, deleted_at) FROM stdin;
1	Et unde qui provident vel voluptas iusto consequatur. Dolore voluptas enim cum illo et explicabo. Earum adipisci et saepe voluptatem assumenda iure dolor.	27	130.03	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
2	Placeat qui blanditiis sit voluptatem cumque dolores eveniet. Sit vel et delectus dolore sed. Ipsa facere accusantium delectus facere sunt sit. Eius et maiores aut.	26	106.89	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
3	Sint rem ex officia iste est et quibusdam. Quis velit sint autem et soluta quae. Laborum est minima error id reprehenderit dolor maxime. Voluptatem ab asperiores quae magnam.	21	142.65	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
4	Possimus occaecati qui iusto labore corporis. Dignissimos et nulla tempore sapiente. Voluptatum corporis necessitatibus unde impedit. Doloribus optio id consequuntur facilis.	31	244.40	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
5	In aut quo aut recusandae minima architecto atque quam. Eum enim qui amet consectetur qui quaerat. Odit beatae et dolores animi ut ducimus. Culpa veritatis dolor nisi ut provident ut.	42	107.85	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
6	Fugiat placeat et sit distinctio reprehenderit molestiae repellendus optio. Adipisci minima amet cum. Omnis mollitia ea blanditiis nemo et.	13	142.76	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
7	Neque nemo non dolore ab autem voluptatem. Dolores voluptatibus sit nobis aperiam natus aperiam. Et facere minima magnam odit.	49	245.83	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
8	Illum qui et nihil temporibus voluptas consequatur cumque. Sit omnis in alias vitae.	5	232.09	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
9	Quas et quia fugit commodi error et atque. Nemo incidunt asperiores ea sint voluptas. Voluptatem sapiente ullam inventore officia molestiae voluptatem nobis et. Et ea nisi a libero et.	35	302.99	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
10	Quia earum quia optio qui. Odit accusantium ad quo dolor et dolorem tempore.	45	251.01	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
11	Et distinctio minima eos eius ut. Magnam ad reiciendis optio cupiditate ea molestiae rerum et. Quisquam aperiam delectus voluptatem quia maxime iusto nihil at. Voluptatum aut dolores eum cupiditate.	38	249.61	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
12	In voluptatem molestias beatae quis. Possimus ut hic similique cum ut quo ipsum. Aliquid in doloribus ullam vero et natus.	20	398.76	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
13	Nemo temporibus iste quidem non optio qui animi eum. Non omnis quis veniam nihil provident ullam. Est repellendus quo ad.	38	162.56	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
14	Nulla ad quia cum nam amet temporibus ut. Unde deserunt officia pariatur est iure non ut. Autem voluptatum sint ea consectetur quasi qui esse.	29	391.56	2017-11-27 20:19:36	2017-11-27 20:19:36	\N
15	Ad aut sunt molestiae culpa itaque reprehenderit. Nostrum et corporis sequi et. Praesentium molestias ad culpa harum. Doloribus iure id ut ut rerum explicabo.	34	385.25	2017-11-27 20:19:37	2017-11-27 20:19:37	\N
16	Ut quae illum est. Doloribus ea quam nesciunt sit aspernatur incidunt. Enim provident reiciendis consequatur.	44	382.63	2017-11-27 20:19:37	2017-11-27 20:19:37	\N
17	Officiis quia delectus praesentium est repellendus voluptatem. Corporis consectetur occaecati in. Officiis consequatur quos aspernatur ut.	6	227.60	2017-11-27 20:19:37	2017-11-27 20:19:37	\N
18	Delectus rerum amet sint placeat sit quaerat qui. Modi cupiditate pariatur sunt et voluptatem. Et nihil iure est commodi quia laudantium.	12	211.82	2017-11-27 20:19:37	2017-11-27 20:19:37	\N
19	Unde autem quas dolor. Asperiores similique rerum non neque ut repudiandae sed velit. Et cumque consequatur ut iste omnis iste. Et ipsa minima quo ducimus dignissimos dignissimos voluptatibus.	8	236.43	2017-11-27 20:19:37	2017-11-27 20:19:37	\N
20	Illum et modi inventore quas rerum. Porro ut qui consequatur consectetur rerum. Distinctio reprehenderit molestias qui aliquam. Ut aut error veritatis voluptatem sed molestiae.	8	225.24	2017-11-27 20:19:37	2017-11-27 20:19:37	\N
21	teste	1	111.00	2017-11-27 23:09:15	2017-11-27 23:09:15	\N
22	teste	1	111.00	2017-11-27 23:12:54	2017-11-27 23:12:54	\N
23	teste	1	123.12	2017-11-27 23:16:46	2017-11-27 23:16:46	\N
\.


--
-- Name: products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('products_id_seq', 23, true);


--
-- Data for Name: rents; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY rents (id, client_id, user_id, start_at, end_at, created_at, updated_at, deleted_at) FROM stdin;
1	1	1	2017-10-31 20:22:43	2017-11-22 20:22:43	2017-11-27 20:22:43	2017-11-27 20:22:43	\N
\.


--
-- Name: rents_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('rents_id_seq', 1, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users (id, name, email, password, remember_token, created_at, updated_at) FROM stdin;
1	Pedro	pams.pedro@gmail.com	$2y$10$2iO05JIah49V6YCWna8uYOjnMBPAX7OzSDinNTxyqriBKHH5HAB.W	ZWcDGadDzGMhD3mAx6IW8SnOsQIeBlzn4RPS4mNmYwq2KCQHT2FfZ3c9wely	2017-11-27 20:19:51	2017-11-27 20:19:51
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 1, true);


--
-- Name: addresses_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY addresses
    ADD CONSTRAINT addresses_pkey PRIMARY KEY (id);


--
-- Name: clients_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY clients
    ADD CONSTRAINT clients_pkey PRIMARY KEY (id);


--
-- Name: migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: phones_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY phones
    ADD CONSTRAINT phones_pkey PRIMARY KEY (id);


--
-- Name: products_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);


--
-- Name: rents_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY rents
    ADD CONSTRAINT rents_pkey PRIMARY KEY (id);


--
-- Name: users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX password_resets_email_index ON password_resets USING btree (email);


--
-- Name: address_client_address_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY address_client
    ADD CONSTRAINT address_client_address_id_foreign FOREIGN KEY (address_id) REFERENCES addresses(id);


--
-- Name: address_client_client_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY address_client
    ADD CONSTRAINT address_client_client_id_foreign FOREIGN KEY (client_id) REFERENCES clients(id);


--
-- Name: address_user_address_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY address_user
    ADD CONSTRAINT address_user_address_id_foreign FOREIGN KEY (address_id) REFERENCES addresses(id);


--
-- Name: address_user_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY address_user
    ADD CONSTRAINT address_user_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: client_phone_client_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY client_phone
    ADD CONSTRAINT client_phone_client_id_foreign FOREIGN KEY (client_id) REFERENCES clients(id);


--
-- Name: client_phone_phone_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY client_phone
    ADD CONSTRAINT client_phone_phone_id_foreign FOREIGN KEY (phone_id) REFERENCES phones(id);


--
-- Name: phone_user_phone_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY phone_user
    ADD CONSTRAINT phone_user_phone_id_foreign FOREIGN KEY (phone_id) REFERENCES phones(id);


--
-- Name: phone_user_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY phone_user
    ADD CONSTRAINT phone_user_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: product_rent_product_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY product_rent
    ADD CONSTRAINT product_rent_product_id_foreign FOREIGN KEY (product_id) REFERENCES products(id);


--
-- Name: product_rent_rent_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY product_rent
    ADD CONSTRAINT product_rent_rent_id_foreign FOREIGN KEY (rent_id) REFERENCES rents(id);


--
-- Name: rents_client_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY rents
    ADD CONSTRAINT rents_client_id_foreign FOREIGN KEY (client_id) REFERENCES clients(id);


--
-- Name: rents_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY rents
    ADD CONSTRAINT rents_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

