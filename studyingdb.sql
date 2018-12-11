-- MySQL dump 10.13  Distrib 5.7.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: studyingdb
-- ------------------------------------------------------
-- Server version	5.7.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `Code` varchar(255) NOT NULL,
  `NameCh` varchar(255) DEFAULT NULL,
  `NameEn` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `ReqOrSel` varchar(255) DEFAULT NULL,
  `Dept` varchar(255) DEFAULT NULL,
  `Instructor` varchar(255) DEFAULT NULL,
  `Credit` int(11) DEFAULT '0',
  `Syllabus` longtext,
  `Evaluation` longtext,
  PRIMARY KEY (`Code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES ('GEAE2107','運動之美','THE AESTHETICS OF SPORT','講授','必','博雅向度一＜美學（感）與文化詮釋＞','羅凱暘',2,'本課程以培養具有美感的未來社會領導人才為問題意識出發，從美感體驗的角度，以身體活動與運動為題材，從身體活動的經驗談起，讓學生對運動的發展先有基礎的認識，再逐步導入美學的基本結構及美感的建構。','1.出席（實際出席次數/應出席次數-以選上課程日起計）：60%\r\n2.課堂報告：20%\r\n3.期末專題：20%'),('GEAE2203','運動競賽倫理','THE ETHICS OF SPORTS COMPETITION','講授','必','博雅向度二＜哲學與道德思維＞','蔡鋒樺,林國欽',2,'一.運動競賽中欺騙行為之探討分析\r\n二.運動競賽打假球行為之探討分析\r\n三.運動競賽中暴力行為之探討分析\r\n四.運動競賽中的禁藥使用及性別問題之探討分析 \r\n五、奧會模式探討分析\r\n六、不同運動文化差異探討分析\r\n七、運動賽制與其延伸之道德行為探討分析\r\n八、國際運動賽事案例分享探討分析','1..出席勤惰及上課表現：40%\r\n2.期中報告：30%\r\n3..期末報告：30%'),('GEAE2317','民主與法治','DEMOCRACY AND RULE OF LAW','講授','必','博雅向度三＜公民與全球視野＞','陳世岳,衛芷言',2,'一 憲法基本概念：理念 架構\r\n二 我們的憲政體制：唐山過台灣\r\n三 我們的政府：制度比較 \r\n四 我們的行憲： 民主憲政與國家發展 \r\n五 我們的人權發展：要拼才會贏\r\n六 我們的憲法？台灣的修憲與釋憲\r\n七 結與解？兩岸憲法與兩岸關係\r\n八 民主政治與法治\r\n九 民主社會與法律\r\n十 家事法律(一)：婚姻之權利與義務 \r\n十一 家事法律(二)：親子、家暴與繼承法律\r\n十二 消保法：消費者之基本權益與消保訴訟\r\n十三 刑事法：常見之犯罪類型介紹\r\n十四 校園法律漫談：智慧財產權之侵害','1.平時成績：50%\r\n2.期末成績：50%'),('GEAE2617','看見國家公園','LOOKING THROUGH NATIONAL PARKS','講授','必','博雅向度六＜自然環境、生態及其永續＞','陳孟仙,徐韶良',2,'本課程分兩大部分:第一部分主要讓學生對國家公園有整體性的認識，從介紹國家公園的興起與演進、國家公園法規、臺灣的國家公園、世界遺產、自然保護區、國家公園分區規劃與內部經營管理工作內容及未來展望。第二部分將對全球海洋保護區的發展及我國海洋型國家公園進行深入說明，包括東沙環礁國家公園、澎湖南方四島國家公園的資源與現地經營管理工作經驗分享，並藉由海洋國家公園管理處解說服務中心參訪及運用VR實境體驗活動，進行環境議題討論，讓學生對國家公園保育理念及海洋生態環境有深刻體悟，未來在生活與工作中可落實保育行動力，讓世世代代可永享美好的自然環境。','1.期中考：30%\r\n2.期末考：30%\r\n3.議題微電影作業：20%\r\n4.平時課堂參與和出席率：20%'),('GEAE2519','烹飪與科學','COOKING AND SCIENCE','講授','必','博雅向度五＜物質與生命世界本質＞','蔣燕南,李容婷',2,'(1). 烹飪的食材種類方法與原理簡介\r\n(2). 食物中五大營養素簡介\r\n(3). 碳水化合物分類與其化學反應\r\n(4). 蛋白質的結構與性質\r\n(5). 脂肪與油的結構與功能\r\n(6). 維生素與礦物質之生理作用與性質\r\n(7). 烹飪方法與技巧之科學原理\r\n(8). 烹飪器具的物性與化性\r\n(9). 醬料成份與製作\r\n(10).食物口感與風味\r\n(11).飲料與酒製作的科學原理\r\n(12).減重飲食與生理學\r\n(13).健康飲食與平衡','1.平時成績：30%\r\n2.期中成績：30%\r\n3.期末評量：40%'),('CSE131','Ｃ程式設計（一）','C COMPUTER PROGRAMMING（I）','講授','必','資工系','蔣依吾',3,'(1) Introduction to C\r\n(2) Elements of C\r\n(3) Selection Constructs\r\n(4) Functions and Program Design\r\n(5) Looping Constructs\r\n(6) Arrays, Vectors,and Matrices\r\n(7) String Processing\r\n(8) Structs and Classes\r\n(9) Pointers and Dynamic Memory','1.作業：30%\r\n2.期中考：30%\r\n3.期末考：40%'),('CSE110','離散數學','DISCRETE MATHEMATICS','講授','必','資工系','范俊逸',3,'探討離散數學原理, 以及在資訊工程領域的應用.','1.平時成績：5%\r\n2.小考(一)：20%\r\n3.期中考試：25%\r\n4.小考(二)：20%\r\n5.學期考試：30%'),('CSE210','線性代數','LINEAR ALGEBRA','講授','必','資工系','陳嘉平',3,'Systems of linear equations. Vectors and matrices. Vector space. Orthogonality. Least-squares problems. Determinants. Eigenvalue problems. Positive definite matrices.','1.Participation：10%\r\n2.Quiz or Homework：20%\r\n3.Midterm：30%\r\n4.Final：40%'),('CSE215','資料結構','DATA STRUCTURES','講授','必','資工系','楊昌彪',3,'Basic Concepts\r\nArrays\r\nStacks and Queues\r\nLinked Lists\r\nTrees\r\nSorting\r\nHashing\r\nEfficient Binary Search Trees\r\nMultiway Search Trees','1.程式作業：20%\r\n2.期中考：25%\r\n3.期末考：25%\r\n4.上機考試：(考試10%+程式作業10%) 必須通過CPE至少一題：20%%\r\n5.測驗與其他(含上課表現、出席狀況等)：10%'),('CSE102','Ｃ程式設計實驗（一）','C COMPUTER PROGRAMMING LABORATORY（I）','實驗','必','資工系','蔣依吾',1,'屬專業基礎課程\r\n(1) Introduction to C\r\n(2) Elements of C\r\n(3) Selection Cons tructs\r\n(4) Functions and Progra m Design\r\n(5) Looping Constructs\r\n(6) Arrays, Vectors,and Matrices\r\n(7) String Processing\r\n(8) Structs and Classe s\r\n(9) Pointers and Dynam ic Memory','1.作業：30%\r\n2.期中考：30%\r\n3.期末考：40%'),('CSE391','物件導向程式設計','OBJECT-ORIENTED PROGRAMMING','講授','必','資工系','李宗南',3,'This course is designed to provide students the knowledge and skills in object-oriented programming, with an emphasis on \"The C++ Programming Language.\"','1.Homework：35%\r\n2.Midterm：25%\r\n3.Final exam.：30%\r\n4.Course participation and inclass test or take itsa on-line program contest ：10%'),('CSE121','微積分（一）','CALCULUS（I）','講授','必','資工系','柯正雯',3,'基本數學運算、極限與微分、微分之運算與應用、積分原理、單變數積分運算.','1.Quiz：40%\r\n2.Midterm Exam：30%\r\n3.Final Exam：30%'),('CSE220','數位系統','DIGITAL SYSTEM','講授','必','資工系','鄺獻榮',3,'‧ Introduction\r\n‧ Digital Systems and Binary Numbers\r\n‧ Boolean Algebra and Logic Gates\r\n‧ Gate-Level Minimization\r\n‧ Combinational Logic\r\n‧ Synchronous Sequential Logic\r\n‧ Registers and Counters\r\n‧ Memory and Programmable Logic\r\n‧ Design at the Register Transfer Level','1.Quiz 1：20%\r\n2.Midterm：30%\r\n3.Quiz 2：20%\r\n4.Final Exam：30%'),('CSE221','數位系統實驗','DIGITAL SYSTEM LABORATORY','實驗','必','資工系','鄺獻榮',1,'教導學生以FPGA實驗板以及相關tools實作各種數位系統單元電路，包含Adder、Multiplier、Comparator、Decoder、Multiplexer、Latches & Flip Flops、Registers、Counters、Memory等，並實做一簡單之數位系統。','1.實作表現、報告繳交與出席情況：100%'),('CSE315','演算法','ALGORITHMS','講授','必','資工系','官大智',3,'Introduction\r\nAlgorithm with Numbers\r\nDivide-and-conquer Algorithms\r\nIntroduction to Graphs and Graph Algorithms\r\nGreedy Algorithms \r\nDynamic Programming\r\nNP-Complete Problems and Approximation Algorithms','1.作業：20%\r\n2.期中考試(二次)：40%\r\n3.期末考試：30%\r\n4.上課表現：10%'),('CSE310','組合語言與微處理機','ASSEMBLY LANGUAGE AND MICROCOMPUTER','講授','必','資工系','張雲南',3,'An Introduction to Processor Design\r\nThe ARM Architecture \r\nARM Assembly Language Programming\r\nARM Organization and Implementation\r\nARM Instruction Set\r\nArchitectural Support for High-level Language\r\nThe Thumb Instruction Set\r\nArchitectural Support for System Development','1.期中考：30%\r\n2.期末考：30%\r\n3.小考、作業、學期報告：40%'),('CSE301','資訊工程論壇','COMPUTER SCIENCE AND ENGINEERING FORUM','演講/參訪','必','資工系','蔣依吾',1,'依規定免登','1.平時成績：25%\r\n2.心得報告：50%\r\n3.隨堂筆記：25%'),('CSE406','專題製作實驗（二）','SPECIAL TOPICS LABORATORY (II)','實驗','必','資工系','林俊宏',1,'1. 專題1. 專題實作\r\n2. 專題內容報告與討論\r\n3. 專題進度報告與討論','1.進度報告及上課參與狀況：25%\r\n2.競賽成績期末書面報告：50%\r\n3.專題指導教授評分：25%'),('CSE312','組合語言與微處理機實驗','ASSEMBLY LANGUAGE AND MICROCOMPUTER LABORATORY','實驗','必','資工系','張雲南',1,'Zedboard平台上軟體程式開發流程的介紹。\r\nZedboard平台週邉控制電路掛載及使用。\r\nZedboard平台上加速電路的開發流程。。\r\nZedboard平台Linux系統的建立及繪圖程式 的開發。\r\nZedboard平台上軟硬體協同整合及驅動程式之撰寫。\r\n期末專題之開發','1.期中考：20%\r\n2.期末專題：35%\r\n3.實驗：45%'),('CSE291','程序導向程式設計','PROCEDURE-ORIENTED PROGRAMMING','講授','選','資工系','江明朝',3,'This course is aimed at teaching students procedure-oriented programming languages---especially C, for many modern-day programming languages, such as C++, Java, C#, and Perl are all based on C and C is still widely used in developing new software, especially in situations where processing power and memory are limited.','1.Homework assignment：50%\r\n2.Midterm：20%\r\n3.Final：30%'),('CSE445','無線網際網路','WIRELESS INTERNET','講授','選','資工系','王友群',3,'本課程預計涵蓋以下無線網路相關之主題:\r\n(1) Signal and spectrum\r\n(2) Multiple access\r\n(3) Wireless MAC-layer protocols\r\n(4) Ad hoc routing\r\n(5) Mobile IP\r\n(6) Handoff\r\n(7) Wireless applications\r\n(8) Wireless security','1.Homework ：40%\r\n2.Oral presentation ：10%\r\n3.Midterm exam ：25%\r\n4.Final exam ：25%'),('CSE430','網際網路資料庫','INTERNET DATABASES','講授','選','資工系','張玉盈',3,'(1)了解基本的關聯式資料庫系統觀念(含實體關係模型，關聯式資料庫模型，從實體關係模型轉換配置成關連式資料庫模型，正規化，SQL語法)\r\n(2)熟知一個實際的關聯式資料庫，例如：Access，SQL Sever等。\r\n(3)網路伺服器之架設訓練。\r\n(4)網頁設計的練習(含HTML的語法，網頁編輯工具，例：FrontPage)。\r\n(5)支援動態(Dynamic)網頁與互動式(Active)網頁的程式設計能力，例如：VB Script，Java Script，ASP等。\r\n(6)深入了解異質資料庫間作相互存取的介面ODBC(Open Database Connectivity)。','1.Lab (homework 10%)：40%\r\n2.Presentation：20%\r\n3.Final：40%'),('CSE325','基礎訊號處理','FUNDAMENTAL SIGNAL PROCESSING','講授','選','資工系','郭可驥',3,'Signals and Systems; Linear Time-Invariant Systems ; Fourier Series Representation of Periodic Signals ; The Continuous-Time Fourier Transform; The Discrete-Time Fourier Transform; Time and Frequency Characterization; Sampling; Communication Systems; The Laplace Transform; The z-Transform','1.First Exam.：25%\r\n2.Second Exam.：25%\r\n3.Third Exam.：25%\r\n4.Homework：20%\r\n5.Attendance and response in class ：5%'),('CSE335','無線行動網路','WIRELESS AND MOBILE NETWORKS','講授','選','資工系','賴威光',3,'本課程之內容包括: 無線通訊網路簡介、IEEE 802.11、無線區域網路的 MAC層、無線區域網路的PHY層、無線區域網路安全、藍芽技術(Bluetooth) 、Wi-Fi、GSM、 GPRS & 3G 、LTE、5G、LPWAN(NB-IoT、LoRa..等相關技術)。','1.期中考：35%\r\n2.期末考：45%\r\n3.平時：10%\r\n4.作業：10%'),('CSE385','網路系統程式設計','NETWORK SYSTEM PROGRAMMING','講授','選','資工系','林俊宏',3,'1. UNIX軟體開發工具介紹\r\n2. UNIX shell programming\r\n3. UNIX System calls\r\n4. UNIX Network programming','1.作業：40%\r\n2.期中考：30%\r\n3.期末考：30%'),('CSE399','機器學習導論','INTRODUCTION TO MACHINE LEARNING','講授','選','資工系','張雲南',3,'1. Python程式語言介紹 \r\n2. 機器學習演算法(迴歸、決策樹、支持向量機、神經網路、深度學習等)及原理介紹 \r\n3. 機器學習程式撰寫 \r\n4. 機器學習套件之使用介紹 \r\n5. 實際資料之探索及應用','1.考試：35%\r\n2.作業及專題：60%\r\n3.平時：5%'),('CSE415','嵌入式系統程式設計','PROGRAMMING FOR EMBEDDED SYSTEMS','講授','選','資工系','希家史提夫',3,'1. Embedded Systems: processors, memories, devices, and networks.\r\n2. Programming device drivers.\r\n3. Using C and C++ in embedded systems: tool-driven and memory-aware programming.\r\n4. Using Embedded System Simulation Tools \r\n5. Program modeling.\r\n6. Software Engineering practices.','1.Homework and Quizzes：5%\r\n2.Attendance and Participation：10%\r\n3.Programming Projects：50%\r\n4.Midterm：15%\r\n5.Final：20%'),('CSE420','資訊人與智慧財產權','INTELLECTUAL PROPERTY AND INFORMATION SOCIETY','講授','選','資工系','黃英哲',3,'	1. 知識經濟簡介\r\n2. 智慧財產權簡介：著作權、專利權、營業秘密、商標等\r\n3. 個案探討\r\n4. 迎接知識經濟的生涯規劃','1.出席：10%\r\n2.平時報告、作業、考試等：50%\r\n3.期中報告：20%\r\n4.期末報告：20%'),('CSE425','硬體描述語言','HARDWARE DESCRIPTION LANGUAGES','講授','選','資工系','蕭勝夫',3,'1. Verilog之相關語法與實例\r\n2, VHDL之相關語法與實例\r\n3. 邏輯合成：從Verilog/VHDL產生實際電路','1.Homework ：60%\r\n2.Exam ：40%'),('CSE435','電子設計自動化及測試導論','INTRODUCTION TO ELECTRONIC DESIGN AUTOMATION & TESTING','講授','選','資工系','李淑敏',3,'CHAPTER 1	Introduction\r\n1.1 Overview of electronic design automation\r\n1.2 Logic design automation\r\n1.3 Test automation\r\n1.4 Physical design automation\r\nCHAPTER 2	Fundamentals of CMOS design\r\n2.1 Introduction\r\n2.2 Integrated circuit technology\r\n2.3 CMOS logic\r\n2.4 Integrated circuit design techniques\r\n2.5 CMOS physical design\r\n2.6 Low-power circuit design techniques\r\nCHAPTER 3	Design for testability\r\n3.1 Introduction\r\n3.2 Testability analysis\r\n3.3 Scan design\r\n3.4 Logic built-in self-test\r\n3.5 Test Compression\r\nCHAPTER 4	Fundamentals of algorithms\r\n4.1 Introduction\r\n4.2 Computational complexity\r\n4.3 Graph algorithms\r\n4.4 Heuristic algorithms\r\n4.5 Mathematical programming\r\nCHAPTER 5	Electronic system-level design and high-level synthesis\r\n5.1 Introduction\r\n5.2 Fundamentals of High-level synthesis\r\n5.3 High-level synthesis algorithm overview\r\n5.4 Scheduling\r\n5.5 Register binding\r\n5.6 Functional unit binding\r\nCHAPTER 6	Logic synthesis in a nutshell\r\n6.1 Introduction\r\n6.2 Data Structures for Boolean representation\r\n6.3 Combinational logic minimization\r\n6.4 Technology mapping\r\n6.5 Timing analysis\r\n6.6 Timing optimization\r\nCHAPTER 7	Test synthesis\r\n7.1 Introduction\r\n7.2 Scan design\r\n7.3 Logic built-in self-test (BIST) design\r\n7.4 RTL Design for testability\r\nCHAPTER 8	Logic and circuit simulation\r\n8.1 Introduction\r\n8.2 Logic simulation models\r\n8.3 Logic simulation techniques\r\n8.4 Hardware-accelerated logic simulation\r\n8.5 Circuit simulation models\r\n8.6 Numerical methods for transient analysis\r\n8.7 Simulation of VLSI interconnects\r\n8.8 Simulation of nonlinear devices\r\nCHAPTER 9	Functional verification\r\n9.1 Introduction\r\n9.2 Verification hierarchy\r\n9.3 Measuring verification quality\r\n9.4 Simulation-based approach\r\n9.5 Formal approaches\r\n9.6 Advanced research\r\nCHAPTER 10	Floorplanning\r\n10.1 Introduction\r\n10.2 Simulated annealing approach\r\n10.3 Analytical approach\r\n10.4 Modern floorplanning considerations\r\nCHAPTER 11	Placement\r\n11.1 Introduction\r\n11.2 Problem formulations\r\n11.3 Global placement: partitioning-based approach\r\n11.4 Global placement: simulated annealing approach\r\n11.5 Global placement: analytical approach\r\n11.6 Legalization\r\n11.7 Detailed placement\r\nCHAPTER 12	Global and detailed routing\r\n12.1 Introduction\r\n12.2 Problem definition\r\n12.3 General-purpose routing\r\n12.4 Global routing\r\n12.5 Detailed Routing\r\n12.6 Modern routing considerations\r\nCHAPTER 13	Synthesis of clock and power/ground network\r\n13.1 Introduction\r\n13.2 Design considerations\r\n13.3 Clock Network design\r\n13.4 Power/ground network design\r\nCHAPTER 14	Fault Simulation and Test Generation\r\n14.1 Introduction\r\n14.2 Fault Collapsing\r\n14.3 Fault Simulation\r\n14.4 Test Generation\r\n14.5 Advanced Test Generation','1.Homework & Attendence：25%\r\n2.Midterm Exam：15%\r\n3.Midterm Report or Program：15%\r\n4.Final Exam：15%\r\n5.Final Report or Project：30%'),('CSE490','安全電子商務','SECURE ELECTRONIC COMMERCE','講授','選','資工系','徐瑞壕',3,'電子商務成功的主要關鍵在於能否取得客戶與消費者的信賴。因此安全機制在電子商務中扮演著極重要的角色。本課程探討電子商務所需的身份認證與安全技術，以及電子付款、數位憑證與安全交易等服務。','1.平時課堂表現：20%\r\n2.期中報告：40%\r\n3.學期考試：40%'),('CSE492','安全程式設計','SECURE PROGRAMMING','講授','選','資工系','王智弘',3,'安全程式設計(Secure Programming) 為資訊安全裡十分重要的課題。由於程式碼的安全是軟體品質的一部份，不良程式撰寫習慣以及未考慮安全防護的程式設計容易導致軟體的弱點以致遭受到攻擊。本課程將以程式安全程式設計概念為主要課程內容，並加入實驗以及專題以進一步教導攻擊威脅及安全分析工具之使用。','1.平時成績、到課率：10%\r\n2.課堂演練：10%\r\n3.作業：20%\r\n4.期中考：20%\r\n5.期末考：25%\r\n6.期末專案：15%'),('GEAE2403','創新科技應用服務','INNOVATIVE TECHNOLOGY ENABLED SERVICES','講授','必','博雅向度四＜科技與社會＞','蔡俊彥',3,'本課程以專題導向學習為設計主軸，提供學生創意實作的標的。課程亦會依課程標的，教導學生有關專業領域知識，同時輔以創意發想、創意表現等課程，以建立創新應用專案的共同知識基礎。\r\n課程提供學生從創意發想到實踐的學習歷程，以MIT(麻省理工學院) App Inventor 2設計完成創意App專案，並上架到Google Play上。MIT App Inventor 2是以拖拉圖示化方式撰寫App程式，以不使用艱澀程式語言的方式來學會程式邏輯。歐美等國積極推廣「一小時學程式」的模式來學程式，英國甚至將寫程式列為中小學必修。透過本課程的學習與體驗實作，讓學習者得以學到分析能力及問題解決能力，以及如何整合所學知識轉化為創意企劃，而且在做中學的過程中學習成長。修課學生須自備Android手機或平版，以便測試專案。','1.出席：20%\r\n2.小作業：30%\r\n3.期中報告：20%\r\n4.期末報告：30%');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coursesel`
--

DROP TABLE IF EXISTS `coursesel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coursesel` (
  `StuID` char(5) NOT NULL,
  `Code` varchar(9) NOT NULL,
  `Score` int(11) DEFAULT NULL,
  PRIMARY KEY (`StuID`,`Code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coursesel`
--

LOCK TABLES `coursesel` WRITE;
/*!40000 ALTER TABLE `coursesel` DISABLE KEYS */;
INSERT INTO `coursesel` VALUES ('B003','CSE430',99),('B003','CSE406',95),('B001','CSE406',66),('B002','CSE406',81),('B004','CSE406',75),('B005','CSE406',63),('B006','CSE406',78),('B009','CSE406',99),('B010','CSE406',91),('B011','CSE406',64),('B012','CSE406',78),('B013','CSE406',98),('B014','CSE406',80),('B015','CSE406',86),('B044','CSE406',98),('B039','CSE406',98),('B042','CSE406',71),('B045','CSE406',75),('B046','CSE406',82),('B047','CSE406',65),('B016','CSE406',92),('B017','CSE406',99),('B018','CSE406',96),('B019','CSE406',99),('B020','CSE406',94),('B021','CSE406',68),('B022','CSE406',72),('B023','CSE406',80),('B024','CSE406',91),('B025','CSE406',99),('B026','CSE406',76),('B027','CSE406',84),('B028','CSE406',81),('B029','CSE406',94),('B030','CSE406',79),('B031','CSE406',94),('B032','CSE406',65),('B033','CSE406',96),('B034','CSE406',97),('B035','CSE406',92),('B036','CSE406',74),('B037','CSE406',82),('B038','CSE406',91),('B040','CSE406',73),('B041','CSE406',82),('B043','CSE406',74),('B007','CSE406',88),('B008','CSE406',78);
/*!40000 ALTER TABLE `coursesel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hw`
--

DROP TABLE IF EXISTS `hw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hw` (
  `CourseCode` varchar(9) CHARACTER SET latin1 NOT NULL,
  `HwName` varchar(255) NOT NULL,
  `StartTime` datetime DEFAULT NULL,
  `EndTime` datetime DEFAULT NULL,
  PRIMARY KEY (`CourseCode`,`HwName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hw`
--

LOCK TABLES `hw` WRITE;
/*!40000 ALTER TABLE `hw` DISABLE KEYS */;
INSERT INTO `hw` VALUES ('CSE406','專題書面報告','2018-11-16 00:11:00','2018-11-26 15:00:00'),('CSE406','專題海報','2018-11-12 00:16:00','2018-11-19 15:00:00'),('CSE430','HW3','2018-11-21 21:00:00','2018-11-30 21:00:00');
/*!40000 ALTER TABLE `hw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hwsubmit`
--

DROP TABLE IF EXISTS `hwsubmit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hwsubmit` (
  `CourseCode` varchar(9) CHARACTER SET latin1 NOT NULL,
  `HwName` varchar(60) NOT NULL,
  `StuID` char(5) CHARACTER SET latin1 NOT NULL,
  `Time` datetime DEFAULT NULL,
  `Score` int(11) DEFAULT NULL,
  PRIMARY KEY (`CourseCode`,`HwName`,`StuID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hwsubmit`
--

LOCK TABLES `hwsubmit` WRITE;
/*!40000 ALTER TABLE `hwsubmit` DISABLE KEYS */;
INSERT INTO `hwsubmit` VALUES ('CSE406','專題海報','B003','2018-11-19 14:00:00',85),('CSE406','專題海報','B044','2018-11-19 14:00:00',90),('CSE406','專題書面報告','B003','2018-11-26 14:00:00',75),('CSE406','專題書面報告','B044','2018-11-26 14:00:00',90),('CSE430','HW3','B003','2018-11-30 19:10:00',100),('CSE430','HW3','B044','2018-11-30 20:30:00',100);
/*!40000 ALTER TABLE `hwsubmit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CourseCode` varchar(255) DEFAULT NULL,
  `FileName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES (1,'CSE430','DBIntroduction.pdf'),(2,'CSE430','Internet_DB_example.doc'),(3,'CSE430','dbs.pdf'),(4,'CSE430','data-model.pdf'),(5,'CSE430','DB2 & SQL.pdf'),(6,'CSE430','SPexample.doc'),(7,'CSE430','Outer Join.pdf'),(8,'CSE430','QBE.pdf'),(9,'CSE430','Embedded SQL.pdf'),(10,'CSE430','EER Model.pdf'),(11,'CSE430','ER to Relation DB.pdf'),(12,'CSE430','ERexample.pdf'),(13,'CSE430','Normalization.pdf'),(14,'CSE430','Normalization1.pdf'),(15,'CSE430','Normalization2.pdf'),(16,'CSE430','Algebra.pdf'),(17,'CSE430','Calculus.pdf'),(18,'CSE430','STORAGE.pdf'),(19,'CSE430','StorageSummary.pdf'),(20,'CSE430','XMLHandout.ppt'),(21,'CSE430','XML_linch.pdf'),(22,'CSE430','SQLcomplete.pdf'),(23,'CSE430','Transaction.pdf');
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `ID` varchar(255) NOT NULL,
  `StuName` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `Birthday` datetime DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Dept` varchar(255) DEFAULT NULL,
  `InYear` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES ('B001','桂思強','男','1997-01-01 00:00:00','b001@student.nsysu.edu.tw','資工系',104),('B002','林明成','男','1997-01-05 00:00:00','b002@student.nsysu.edu.tw','資工系',104),('B003','范瑋','男','1997-01-09 00:00:00','b003@student.nsysu.edu.tw','資工系',104),('B004','黃偉立','男','1997-01-23 00:00:00','b004@student.nsysu.edu.tw','資工系',104),('B005','周浩','男','1997-02-28 00:00:00','b005@student.nsysu.edu.tw','資工系',104),('B006','張成功','男','1997-03-31 00:00:00','b006@student.nsysu.edu.tw','資工系',104),('B009','黃子晴','女','1997-10-10 00:00:00','b009@student.nsysu.edu.tw','資工系',104),('B010','李品妍','女','1996-10-31 00:00:00','b010@student.nsysu.edu.tw','資工系',104),('B011','王宜蓁','女','1996-11-30 00:00:00','b011@student.nsysu.edu.tw','資工系',104),('B012','吳欣妤','女','1996-12-25 00:00:00','b012@student.nsysu.edu.tw','資工系',104),('B013','劉詩涵','女','1996-12-31 00:00:00','b013@student.nsysu.edu.tw','資工系',104),('B014','蔡雅婷','女','1996-01-23 00:00:00','b014@student.nsysu.edu.tw','資工系',104),('B015','楊怡君','女','1996-02-29 00:00:00','b015@student.nsysu.edu.tw','資工系',104),('B044','吳忻','男','1996-03-21 00:00:00','b044@student.nsysu.edu.tw','資工系',104),('B039','周池','男','1997-04-14 00:00:00','b039@student.nsysu.edu.tw','資工系',104),('B042','施璋','男','1996-12-08 00:00:00','b042@student.nsysu.edu.tw','資工系',104),('B045','柯心怡','女','1996-09-05 00:00:00','b045@student.nsysu.edu.tw','資工系',104),('B046','陳小零','男','1996-04-04 00:00:00','b046@student.nsysu.edu.tw','應數系',103),('B047','陳誠','男','1997-06-30 00:00:00','b047@student.nsysu.edu.tw','資管系',104),('B016','吳惠郁','女','1996-12-20 00:00:00','b016@student.nsysu.edu.tw','資工系',104),('B017','游倫瑞','男','1996-12-18 00:00:00','b017@student.nsysu.edu.tw','資工系',104),('B018','吳佳玲','女','1996-12-27 00:00:00','b018@student.nsysu.edu.tw','資工系',104),('B019','劉冠紫','女','1997-04-08 00:00:00','b019@student.nsysu.edu.tw','資工系',104),('B020','連晉治','男','1997-08-30 00:00:00','b020@student.nsysu.edu.tw','資工系',104),('B021','汪庭瑋','男','1996-11-14 00:00:00','b021@student.nsysu.edu.tw','資工系',104),('B022','林耀德','男','1997-02-07 00:00:00','b022@student.nsysu.edu.tw','資工系',104),('B023','張秀玲','女','1996-09-06 00:00:00','b023@student.nsysu.edu.tw','資工系',104),('B024','李雅雯','女','1996-12-02 00:00:00','b024@student.nsysu.edu.tw','資工系',104),('B025','藍家銘','男','1996-09-27 00:00:00','b025@student.nsysu.edu.tw','資工系',104),('B026','楊志樺','男','1997-01-28 00:00:00','b026@student.nsysu.edu.tw','資工系',104),('B027','黃宜靜','女','1997-05-31 00:00:00','b027@student.nsysu.edu.tw','資工系',104),('B028','許惠君','女','1997-01-12 00:00:00','b028@student.nsysu.edu.tw','資工系',104),('B029','鄭建德','男','1997-04-29 00:00:00','b029@student.nsysu.edu.tw','資工系',104),('B030','王裕翔','男','1996-09-08 00:00:00','b030@student.nsysu.edu.tw','資工系',104),('B031','黃俊宇','男','1997-04-05 00:00:00','b031@student.nsysu.edu.tw','資工系',104),('B032','張哲宏','男','1996-10-22 00:00:00','b032@student.nsysu.edu.tw','資工系',104),('B033','鄭柏毅','男','1997-07-23 00:00:00','b033@student.nsysu.edu.tw','資工系',104),('B034','劉怡如','女','1997-01-15 00:00:00','b034@student.nsysu.edu.tw','資工系',104),('B035','張祐均','男','1997-08-01 00:00:00','b035@student.nsysu.edu.tw','資工系',104),('B036','謝家銘','男','1997-01-04 00:00:00','b036@student.nsysu.edu.tw','資工系',104),('B037','詹玉婷','女','1997-05-30 00:00:00','b037@student.nsysu.edu.tw','資工系',104),('B038','黃昱啟','男','1997-06-08 00:00:00','b038@student.nsysu.edu.tw','資工系',104),('B040','謝家瑋','男','1996-10-01 00:00:00','b040@student.nsysu.edu.tw','資工系',104),('B041','曾典宏','男','1996-10-13 00:00:00','b041@student.nsysu.edu.tw','資工系',104),('B043','王柏豪','男','1996-09-19 00:00:00','b043@student.nsysu.edu.tw','資工系',104),('B007','鄭世綸','男','1997-08-10 00:00:00','b007@student.nsysu.edu.tw','資工系',104),('B008','白姵君','女','1996-12-24 00:00:00','b008@student.nsysu.edu.tw','資工系',104);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `ID` varchar(255) NOT NULL,
  `TchName` varchar(255) DEFAULT NULL,
  `Dept` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES ('GEPH5904','林國欽','通識教育中心運動與健康教育組'),('GE5861','陳世岳','通識教育中心'),('GEHS2529','衛芷言','通識教育中心人文與社會科學教育組'),('GENA5846','蔡俊彥','通識教育中心自然與應用科學教育組'),('CHEM3949','蔣燕南','化學系'),('EE4175','李容婷','電機系'),('OCEAN5028','陳孟仙','海資系'),('GENA0000','徐韶良','通識教育中心自然與應用科學教育組'),('CSE4323','王友群','資工系'),('CSE4321','江明朝','資工系'),('CSE4313','李宗南','資工系'),('CSE4320','李淑敏','資工系'),('CSE4339','林俊宏','資工系'),('CSE4330','柯正雯','資工系'),('CSE4366','徐瑞壕','資工系'),('CSE4346','范俊逸','資工系'),('CSE4342','陳嘉平','資工系'),('CSE4347','陳坤志','資工系'),('CSE4315','黃英哲','資工系'),('CSE4322','郭可驥','資工系'),('CSE4334','張玉盈','資工系'),('CSE4332','張雲南','資工系'),('CSE4333','楊昌彪','資工系'),('CSE4312','賴威光','資工系'),('CSE4314','蕭勝夫','資工系'),('CSE4340','鄺獻榮','資工系'),('CSE4338','官大智','資工系'),('CSE4310','謝文雄','資工系'),('CSE4305','王智弘','資工系'),('GEPH5878','羅凱暘','通識教育中心運動與健康教育組'),('GEPH2808','蔡鋒樺','通識教育中心運動與健康教育組');
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userId` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `privilege` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('b001','b001','桂思強','user'),('b003','b003','范瑋','admin'),('b044','b044','吳忻','admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-11 17:32:27
