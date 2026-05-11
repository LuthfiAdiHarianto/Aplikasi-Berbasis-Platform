import "package:flutter/material.dart";

import package fluter/material.dart;

main () => runApp (fluter1());

class fluter1 extends StatelesWidget {
  @override
  Widget build (BuildContext context) {
    return MaterialApp (
      title: "Flutter 1",
      home: Scaffold (
        appBar: AppBar (
          title: Text ("Ini Aplikasi Flutter saya"),
        ),
        body: Center (
          child: Text ("Ini data saya"),
        ),
      ),
    );
  }
}