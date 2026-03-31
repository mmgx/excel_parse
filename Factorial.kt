import java.math.BigInteger

fun factorial(n: Int): BigInteger {
    require(n >= 0) { "Factorial is only defined for non-negative integers." }

    var result = BigInteger.ONE
    for (i in 2..n) {
        result = result.multiply(i.toBigInteger())
    }

    return result
}

fun readFactorial(): BigInteger {
    val number = readln().trim().toInt()
    return factorial(number)
}

fun main() {
    println(readFactorial())
}
