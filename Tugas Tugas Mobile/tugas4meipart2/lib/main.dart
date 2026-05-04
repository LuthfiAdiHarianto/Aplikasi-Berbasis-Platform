import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp11());
}

// ==========================
// APP UTAMA
// ==========================

class MyApp11 extends StatelessWidget {
  const MyApp11({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'ABP Minggu 11',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: const MyHomePage(title: 'ABP Minggu 11'),
      debugShowCheckedModeBanner: false,
    );
  }
}

// ==========================
// HALAMAN HOME DENGAN PAGEVIEW
// ==========================

class MyHomePage extends StatefulWidget {
  const MyHomePage({super.key, required this.title});

  final String title;

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  int selected = 0;

  PageController pc = PageController(initialPage: 0);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,

      body: SafeArea(
        child: PageView(
          controller: pc,
          onPageChanged: (index) {
            setState(() {
              selected = index;
            });
          },
          children: [
            // ==========================
            // PAGE HOME
            // ==========================
            Center(
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  InkWell(
                    child: const Text(
                      'Go to Home page',
                      style: TextStyle(fontSize: 30),
                    ),
                    onTap: () {
                      Navigator.push(
                        context,
                        MaterialPageRoute(
                          builder: (context) => const MyApp(),
                        ),
                      );
                    },
                  ),

                  const SizedBox(height: 30),

                  InkWell(
                    child: const Text(
                      'Go to Tutorial 11-1',
                      style: TextStyle(
                        color: Colors.indigo,
                        fontSize: 20,
                      ),
                    ),
                    onTap: () {
                      Navigator.push(
                        context,
                        MaterialPageRoute(
                          builder: (context) => const MyApp1_1(),
                        ),
                      );
                    },
                  ),
                ],
              ),
            ),

            // ==========================
            // PAGE EMAIL
            // ==========================
            const Center(
              child: Text(
                'Email page',
                style: TextStyle(fontSize: 30),
              ),
            ),

            // ==========================
            // PAGE PROFILE
            // ==========================
            const Center(
              child: Text(
                'Profile page',
                style: TextStyle(fontSize: 30),
              ),
            ),
          ],
        ),
      ),

      bottomNavigationBar: BottomNavigationBar(
        type: BottomNavigationBarType.fixed,
        backgroundColor: Colors.blue,
        selectedItemColor: Colors.deepOrange,
        unselectedItemColor: Colors.white,
        currentIndex: selected,
        onTap: (index) {
          setState(() {
            selected = index;
          });

          pc.animateToPage(
            index,
            duration: const Duration(milliseconds: 200),
            curve: Curves.linear,
          );
        },
        items: const [
          BottomNavigationBarItem(
            icon: Icon(Icons.home_filled),
            label: 'Home',
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.email),
            label: 'Email',
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.person),
            label: 'Profile',
          ),
        ],
      ),
    );
  }
}

// ==========================
// HALAMAN TUJUAN: HOME PAGE
// ==========================

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Home Page'),
        backgroundColor: Colors.blue,
      ),
      body: const Center(
        child: Text(
          'Ini adalah Home Page',
          style: TextStyle(fontSize: 30),
        ),
      ),
    );
  }
}

// ==========================
// HALAMAN TUJUAN: TUTORIAL 11-1
// ==========================

class MyApp1_1 extends StatelessWidget {
  const MyApp1_1({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Tutorial 11-1'),
        backgroundColor: Colors.indigo,
      ),
      body: const Center(
        child: Text(
          'Ini adalah halaman Tutorial 11-1',
          style: TextStyle(fontSize: 25),
        ),
      ),
    );
  }
}