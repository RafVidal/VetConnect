import 'dart:async';

import 'package:flutter/widgets.dart';

import 'package:path/path.dart';
import 'package:sqflite/sqflite.dart';

void main() async {
  WidgetsFlutterBinding.ensureInitialized();

  final database = openDatabase(
    join(await getDatabasesPath(), 'database.db'),
    onCreate: (db, version) {
      return db.execute(
        'CREATE TABLE idtoken(id INTEGER PRIMARY KEY, token TEXT)',
      );
    },
    version: 1,
  );

  Future<void> insertToken(Token token) async {
    final db = await database;

    await db.insert(
      'token',
      token.toMap(),
      conflictAlgorithm: ConflictAlgorithm.replace,
    );
  }

  Future<List<Token>> token() async {
    final db = await database;

    final List<Map<String, dynamic>> maps = await db.query('token');

    return List.generate(maps.length, (i) {
      return Token(
        idToken: maps[i]['id'],
        token: maps[i]['token'],
      );
    });
  }

  Future<void> updateToken(Token token) async {
    final db = await database;

    await db.update(
      'token',
      token.toMap(),
      where: 'id = ?',
      whereArgs: [token.idToken],
    );
  }

  Future<void> deleteToken(int id) async {
    final db = await database;

    await db.delete(
      'token',
      where: 'id = ?',
      whereArgs: [id],
    );
  }
}

class Token {
  final String idToken;
  final String token;

  Token({
    required this.idToken,
    required this.token,
  });

  Map<String, dynamic> toMap() {
    return {
      'id': idToken,
      'token': token,
    };
  }

  @override
  String toString() {
    return 'Token{id: $idToken, token: $token}';
  }
}
