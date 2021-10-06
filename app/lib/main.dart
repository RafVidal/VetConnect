import 'package:flutter/material.dart';
import 'package:vetconnect/views/Inicial/tela_inicial.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  // This widget is the root of your application.

  @override
  Widget build(BuildContext context) {
    var kPrimaryColor;
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'VetConnect',
      theme: ThemeData(primaryColor: Colors.white),
      home: TelaInicial(),
    );
  }
}
