import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp1());
}

class MyApp1 extends StatelessWidget {
  const MyApp1({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'AI App',
      theme: ThemeData(
        primarySwatch: Colors.green,
      ),
      home: const MyHomePage(),
      debugShowCheckedModeBanner: false,
    );
  }
}

class MyHomePage extends StatefulWidget {
  const MyHomePage({super.key});

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  final List<Map<String, dynamic>> data = [
    {
      'title': 'Native App',
      'platform': 'Android, iOS',
      'lang': 'Java, Kotlin, Swift, C#',
      'color': Colors.red,
    },
    {
      'title': 'Hybrid App',
      'platform': 'Android, iOS, Web',
      'lang': 'JavaScript, Dart',
      'color': Colors.grey,
    },
  ];

  final titleInput = TextEditingController();
  final platformInput = TextEditingController();
  final langInput = TextEditingController();

  List<DropdownMenuItem<String>> ddItems = [];
  String? colSelected;

  @override
  void initState() {
    super.initState();

    for (String col in colors) {
      ddItems.add(
        DropdownMenuItem(
          value: col,
          child: Text(col),
        ),
      );
    }
  }

  final List<String> colors = [
    'blue',
    'green',
    'yellow',
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,

      body: SafeArea(
        child: ListView.builder(
          itemCount: data.length,
          itemBuilder: (context, index) {
            return Card(
              color: Colors.white,
              child: InkWell(
                child: Container(
                  padding: const EdgeInsets.only(left: 20),
                  child: Row(
                    children: [
                      CircleAvatar(
                        radius: 30,
                        backgroundColor: data[index]['color'],
                      ),
                      const SizedBox(width: 15),
                      Container(
                        margin: const EdgeInsets.only(
                          bottom: 40,
                          left: 10,
                          top: 10,
                        ),
                        padding: const EdgeInsets.only(top: 15),
                        child: Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Text(
                              data[index]['title'],
                              style: TextStyle(
                                color: Colors.blue,
                                fontSize: 20,
                                fontStyle: FontStyle.italic,
                              ),
                            ),
                          ],
                        ),
                      ),
                    ],
                  ),
                ),
                onTap: () {
                  showDialog(
                    context: context,
                    builder: (BuildContext context) {
                      return AlertDialog(
                        title: Text(data[index]['title']),
                        content: SingleChildScrollView(
                          child: Container(
                            margin: const EdgeInsets.only(
                              bottom: 40,
                              left: 10,
                              top: 10,
                            ),
                            padding: const EdgeInsets.only(top: 15),
                            child: Column(
                              crossAxisAlignment: CrossAxisAlignment.start,
                              children: [
                                Text(
                                  data[index]['title'],
                                  style: const TextStyle(
                                    color: Colors.blue,
                                    fontSize: 20,
                                  ),
                                ),
                                Text(
                                  data[index]['platform'],
                                  style: const TextStyle(
                                    color: Colors.blue,
                                    fontSize: 20,
                                  ),
                                ),
                                Text(
                                  data[index]['lang'],
                                  style: const TextStyle(
                                    color: Colors.blue,
                                    fontSize: 20,
                                  ),
                                ),
                              ],
                            ),
                          ),
                        ),
                        actions: [
                          TextButton(
                            child: const Text('Close'),
                            onPressed: () {
                              Navigator.of(context).pop();
                            },
                          ),
                        ],
                      );
                    },
                  );
                },
              ),
            );
          },
        ),
      ),

      floatingActionButton: FloatingActionButton(
        child: const Icon(Icons.add),
        onPressed: () {
          var snackBar = SnackBar(
            content: const Text('Add new tech'),
            action: SnackBarAction(
              label: 'Add',
              onPressed: () {
                showDialog(
                  context: context,
                  builder: (BuildContext context) {
                    return SimpleDialog(
                      title: const Text('Add New Tech'),
                      children: [
                        Column(
                          children: [
                            TextFormField(
                              decoration: const InputDecoration(
                                labelText: 'Tech Name',
                                contentPadding: EdgeInsets.all(10),
                                hintText: 'Tech Name',
                              ),
                              controller: titleInput,
                            ),
                            TextFormField(
                              decoration: const InputDecoration(
                                labelText: 'Platform',
                                contentPadding: EdgeInsets.all(10),
                                hintText: 'Platform',
                              ),
                              controller: platformInput,
                            ),
                            TextFormField(
                              decoration: const InputDecoration(
                                labelText: 'Lang',
                                contentPadding: EdgeInsets.all(10),
                                hintText: 'Lang',
                              ),
                              controller: langInput,
                            ),
                            DropdownButtonFormField<String>(
                              items: ddItems,
                              onChanged: (val) {
                                setState(() {
                                  colSelected = val;
                                });
                              },
                            ),
                            ElevatedButton(
                              child: const Text('Save'),
                              onPressed: () {
                                if (colSelected == 'blue') {
                                  setState(() {
                                    data.add({
                                      'title': titleInput.text,
                                      'platform': platformInput.text,
                                      'lang': langInput.text,
                                      'color': Colors.blue,
                                    });
                                  });
                                } else if (colSelected == 'green') {
                                  setState(() {
                                    data.add({
                                      'title': titleInput.text,
                                      'platform': platformInput.text,
                                      'lang': langInput.text,
                                      'color': Colors.green,
                                    });
                                  });
                                } else if (colSelected == 'yellow') {
                                  setState(() {
                                    data.add({
                                      'title': titleInput.text,
                                      'platform': platformInput.text,
                                      'lang': langInput.text,
                                      'color': Colors.yellow,
                                    });
                                  });
                                }

                                titleInput.clear();
                                platformInput.clear();
                                langInput.clear();

                                Navigator.of(context).pop();
                              },
                            ),
                          ],
                        ),
                      ],
                    );
                  },
                );
              },
            ),
          );

          ScaffoldMessenger.of(context).showSnackBar(snackBar);
        },
      ),
    );
  }
}